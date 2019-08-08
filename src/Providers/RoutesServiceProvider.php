<?php
/**
 * Created by PhpStorm.
 * User: xyz
 * Date: 2019-05-06
 * Time: 09:48
 */

namespace Cube\Ccp\Providers;

use Illuminate\Support\ServiceProvider;

class RoutesServiceProvider extends ServiceProvider
{
    /**
     * 定义路由文件文件名
     */
    const CONFIG_ROUTES = 'elasticsearch.routes';

    /**
     * 加载路由文件
     */
    public function boot()
    {
        foreach (config(self::CONFIG_ROUTES) as $path) {
            $this->loadRoutesFrom($path);
        }
    }
}
