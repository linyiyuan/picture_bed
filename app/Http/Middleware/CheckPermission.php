<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class CheckPermission
 * @package App\Http\Middleware
 * @Author YiYuan-LIn
 * @Date: 2019/7/28
 * 检查权限是否合法中间件
 */
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //生成当前访问的路由以及控制器标识（与权限对比）
        $actionName = 'Api:' . Request::path() . '-' . Route::current()->getActionMethod();
        $actionName = preg_replace('/\/\d+/', '', $actionName);
        //获取当前用户
        $user = JWTAuth::parseToken()->toUser();

        //判断是否是超级管理员
        if ($user->hasRole('super_admin')) {
            return $next($request);
        }
        //获取用户拥有的权限
        $permission = $user->getPermissionsViaRoles()->toArray();
        $permission = array_column($permission, 'name');

        //判断是否有权限
        if (!in_array($actionName, $permission)) {
            // 没有权限则返回到403页面
            return response()->json([
                'errorCode' => 403,
                'data' => ['message' => '您没有权限访问']
            ]);
        }
        return $next($request);
    }
}
