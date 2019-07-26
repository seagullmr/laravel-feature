<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * 对请求参数内容进行 前后空白字符清理。可通过 $except 数组属性设置不做处理的参数。
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
