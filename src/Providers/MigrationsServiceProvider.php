<?php
/**
 * Created by PhpStorm.
 * User: xyz
 * Date: 2019-05-06
 * Time: 09:48
 */

namespace Cube\Ccp\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationsServiceProvider extends ServiceProvider
{
    /**
     * 加载数据库迁移
     */
    public function boot()    {
        $this->loadMigrationsFrom(elasticsearch_migrations_path());
    }
}
