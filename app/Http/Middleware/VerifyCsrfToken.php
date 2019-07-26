<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * 验证请求里的令牌是否与存储在会话中令牌匹配
     */

    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * 可通过 $except 数组属性设置不做 CSRF 验证的网址
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
