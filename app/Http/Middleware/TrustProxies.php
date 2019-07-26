<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * 配置可信代理
     */

    /**
     * 可通过 $proxies 属性设置可信代理列表
     *
     * @var array|string
     */
    protected $proxies;

    /**
     * $headers 属性设置用来检测代理的 HTTP 头字段
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
