<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::group(['namespace' => 'Api'],function(){
// ================== 不需要Token认证权限的路由 ==================
        //后台登录相关接口
        Route::group(['prefix' => 'auth', 'namespace' => 'Auth'] ,function() {
            Route::post('login', 'LoginController@login');      //验证登录接口
            Route::post('logout', 'LoginController@logOut');    //退出登录
        });
        //一些公共接口
        Route::group(['prefix' => 'common', 'namespace' => 'Common'], function() {
            Route::get('send_phone_code', 'SmsController@sendPhoneCode');         //发送短信验证码接口
        });

// ================== 需要Token认证的接口路由 ==================
        Route::middleware(['refresh.token'])->group(function(){
            //一些公共接口
            Route::group(['prefix' => 'common', 'namespace' => 'Common'], function() {
                Route::post('upload_pic', 'UploadController@uploadPic');                        //上传图片接口
                Route::post('upload_file', 'UploadController@uploadFile');                      //上传文件接口
            });

            Route::group(['prefix' => 'auth', 'namespace' => 'Auth'] ,function(){
                Route::get('getInfo', 'LoginController@getInfo');                       //获取用户信息接口
            });

            // ================== 需要权限认证的接口路由 ==================
            Route::middleware(['check.permission','record.operate'])->group(function(){
             

                //后台登录相关接口
                Route::group(['prefix' => 'auth', 'namespace' => 'Auth'] ,function(){
                    Route::resource('role', 'RoleController');                      //角色控制器
                    Route::resource('permission', 'PermissionsController');         //权限控制器
                    Route::resource('user', 'UserController');                      //用户控制器
                    Route::post('reset_password', 'LoginController@resetPassword');      //重置用户密码
                    Route::post('give_permission', 'LoginController@givePermission');     //分配权限给角色
                });

                //系统管理
                Route::group(['prefix' => 'system', 'namespace' => 'System'], function() {
                    Route::get('get_config', 'ConfigController@getConfig');                 //获取系统配置信息
                    Route::get('get_operate_log', 'OperateLogController@getList');          //获取操作日志列表
                    Route::get('get_home_data', 'HomePageController@showData');             //获取首页展示数据
                });

            
                Route::get('test', 'TestController@test'); //测试接口

            });
        });
    });



