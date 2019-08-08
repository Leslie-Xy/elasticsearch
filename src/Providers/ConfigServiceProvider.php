<?php
/**
 * Created by PhpStorm.
 * User: xyz
 * Date: 2019-05-06
 * Time: 09:48
 */

namespace Leslie\elasticsearch\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * 定义配置文件文件名
     */
    const CONFIG_FILE = 'elasticsearch.php';

    /**
     * 配置文件 KEY
     */
    const CONFIG_KEY = 'elasticsearch';

    /**
     * 启动运行配置
     */
    public function boot()
    {
        $this->publishes([
            elasticsearch_config_path(self::CONFIG_FILE) => config_path(self::CONFIG_FILE)
        ], 'config');
    }

    /**
     * 注册配置
     */
    public function register()
    {
        $this->mergeConfigFrom(elasticsearch_config_path(self::CONFIG_FILE), self::CONFIG_KEY);
    }
}
