<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * 检测项目是否处于 维护模式。可通过 $except 数组属性设置在维护模式下仍能访问的网址
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
