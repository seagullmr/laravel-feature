<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

// 版本确认
$api->version('v1', function($api) {
    $api->get('version', function() {
        return response('this is version v1');
    });
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});

// v1 版本路由管理
$api->version('v1', [
    // 接口访问控制器的命名空间
    'namespace' => 'App\Http\Controllers',
    // 中间件 serializer:array【统一返回格式】
    'middleware' => ['serializer:array']
], function ($api) {
    $api->group([
        // 启用节流限制中间件，开启后后面的请求限制和过期时间才起效
        'middleware' => 'api.throttle',
        // 请求限制
        'limit' => config('api.rate_limits.sign.limit'),
        // 过期时间
        'expires' => config('api.rate_limits.sign.expires'),
    ], function ($api) {
        // 需要 token 验证的接口
        $api->group([
            'middleware' => 'api.auth',
        ], function ($api) {

        });
        /**
         * 游客可访问的接口
         */
        $api->get('user', 'UsersController@index');
        $api->get('user/{id}', 'UsersController@show')->name('user.show');

        // Dingo API
        $api->get('dingos/array', 'DingosController@resArray')->name('dingos.array');
        $api->get('dingos/transformer/{id}', 'DingosController@transformer')->name('dingos.transformer');

        // Carbon
        $api->get('carbon/day', 'CarbonController@day')->name('carbon.day');
        $api->get('carbon/month', 'CarbonController@month')->name('carbon.month');

        // Route
        $api->get('user/{id}', 'UsersController@show')->name('user.show'); // id 为全局约束路由，当 id 为数字时执行
        $api->get('users/{user}', 'UsersController@show')->where(['name' => '[0-9]+']);


    });
});