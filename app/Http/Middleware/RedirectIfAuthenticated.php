<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * 当请求页是 注册、登录、忘记密码 时，检测用户是否已经登录，
     * 如果已经登录，那么就重定向到首页，如果没有就打开相应界面。
     * 可以在 handle 方法中定制重定向到的路径
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
