<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ---------- 首页路由
Route::view('/','index');

Route::group(['namespace' => 'Web'],function(){
    //图片相关路由
    Route::group(['namespace' => 'Photo'] ,function() {
        //相册列表页
        Route::get('/photo_list','PhotoController@getPhotoAlbumList');
        //相册详情页
        Route::any('/photo_detail/{id}','PhotoController@getPhotoList');
        //个人信息
        Route::get('/personal','PhotoController@getPersonal');
        Route::get('/test','PhotoController@test');

    });
});


