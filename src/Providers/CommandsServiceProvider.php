<?php
/**
 * Created by PhpStorm.
 * User: xyz
 * Date: 2019-05-06
 * Time: 09:48
 */

namespace Cube\Ccp\Providers;

use ReflectionClass;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;
use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Command;

class CommandsServiceProvider extends ServiceProvider
{
    /**
     * 注册配置文件中的 Console
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->load(elasticsearch_src_path('Commands'));
        }
    }

    /**
     * Register all of the commands in the given directory.
     * @param  string $paths
     * @throws \ReflectionException
     * @return bool
     */
    protected function load($paths)
    {

        //获取命名空间
        $namespace = str_replace('\\Providers', '\\Commands', __NAMESPACE__);

        //查找路径下的文件
        foreach ((new Finder())->in($paths)->files() as $command) {
            //获取类
            $class = str_replace('.php', '', $command->getFilename());

            //获取command类
            $command = $namespace . '\\' . $class;

            //验证是否继承Command类
            if (!is_subclass_of($command, Command::class)) {
                return false;
            }

            //验证是否是抽象类
            if ((new ReflectionClass($command))->isAbstract()) {
                return false;
            }

            //注册 command 命令
            Artisan::starting(function ($artisan) use ($command) {
                $artisan->resolve($command);
            });
        }
    }
}
