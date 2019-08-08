<?php

if (!function_exists('elasticsearch_base_path')) {

    /**
     * Get elasticsearch base path.
     *
     * @param string $path
     *
     * @return string
     */
    function elasticsearch_base_path($path = '')
    {
        return __DIR__ . '/../' . $path;
    }
}

if (!function_exists('elasticsearch_view_path')) {

    /**
     * Get elasticsearch view path.
     *
     * @param string $path
     *
     * @return string
     */
    function elasticsearch_view_path($path = '')
    {
        return elasticsearch_base_path('views/' . $path);
    }
}


if (!function_exists('elasticsearch_config_path')) {

    /**
     * Get elasticsearch path.
     *
     * @param string $path
     *
     * @return string
     */
    function elasticsearch_config_path($path = '')
    {
        return elasticsearch_base_path('config/' . $path);
    }
}

if (!function_exists('elasticsearch_route_path')) {

    /**
     * Get elasticsearch route path.
     *
     * @param string $path
     *
     * @return string
     */
    function elasticsearch_route_path($path = '')
    {
        return elasticsearch_base_path('routes/' . $path);
    }
}


if (!function_exists('elasticsearch_migrations_path')) {

    /**
     * Get elasticsearch migrations path.
     *
     * @param string $path
     *
     * @return string
     */
    function elasticsearch_migrations_path($path = '')
    {
        return elasticsearch_base_path('database/migrations/' . $path);
    }
}

if (!function_exists('elasticsearch_src_path')) {

    /**
     * Get elasticsearch src path.
     *
     * @param string $path
     *
     * @return string
     */
    function elasticsearch_src_path($path = '')
    {
        return elasticsearch_base_path('src/' . $path);
    }
}