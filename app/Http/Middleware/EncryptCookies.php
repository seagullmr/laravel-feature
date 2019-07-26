<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * 对 Cookie 进行加解密处理与验证。可通过 $except 数组属性设置不做加密处理的 cookie
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
