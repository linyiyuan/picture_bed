<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class RecordOperate
 * @package App\Http\Middleware
 * @Author YiYuan-LIn
 * @Date: 2019/5/31
 * 记录操作日志中间件
 */
class RecordOperate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        //记录操作的方法
        $method = ['POST', 'PUT', 'DELETE'];
        $request_method = $request->method();
        if (!in_array($request_method, $method)) return $response;

        //生成当前访问的路由
        $actionName = 'Api:' . Request::path() . '-' . Route::current()->getActionMethod();
        $actionName = preg_replace('/\/\d+/', '', $actionName);
        $action = Permission::where('name', $actionName)->value('display_name');

        //获取当前用户
        $user = JWTAuth::parseToken()->toUser();
        $uid = $user->id;

        //获取相应结果 并处理
        $responseData = objToArray($response);
        $errorCode = $responseData['original']['errorCode'] ?? '';
        if ($errorCode == 200) {
            $dealResult = '成功';
        }else{
            $dealResult = '';
            if (!empty($responseData['original']['message'])) $dealResult = $responseData['original']['message'];

        }
        \App\Http\Utils\RecordOperate::recordOperate($uid, $action, json_encode($request->all()), $dealResult);

        return $response;
    }
}
