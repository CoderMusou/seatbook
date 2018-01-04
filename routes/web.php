<?php

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

//Route::get('/', "TestController@index");

use Illuminate\Support\Facades\Route;

Route::namespace('H5')->middleware(['WeChatOAuth'])->group(function () {                         //需要微信授权的路由
//     控制器在 "App\Http\Controllers\H5" 命名空间下
    Route::get('/', 'IndexController@index');
    Route::get('/room', 'BookController@room');
    Route::post('/getsub', 'BookController@getSub');
    Route::get('/seat/{id}', 'BookController@seat');
    Route::post('/tobook', 'BookController@book');
    Route::post('/topart/{id}', 'BookController@part');
    Route::post('/toleave/{id}', 'BookController@leave');
    Route::post('/cancel/{id}', 'BookController@cancel');
    Route::get('/book', 'MyBookController@index');
    Route::get('/rank', 'RankController@index');
    Route::get('/count', 'RankController@count');
    Route::get('/msg', 'MessageController@index');
    Route::get('/msg/{id}', 'MessageController@message');
    Route::get('/user', 'UserController@index');
    Route::post('/user/submit', 'UserController@update');
});
Route::get('/user/bind', 'H5\UserController@bind');                             //学号绑定
Route::post('/user/bind', 'H5\UserController@bindPost');                             //学号绑定
Route::get('/oauth', "WeChatOAuthController@index");                            //微信 OAuth 登录回调


Route::group(['namespace' => 'Admin','prefix' => 'manager'], function(){
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下
    Route::any('/', 'IndexController@index');
    Route::any('/login', 'IndexController@login');
    Route::any('/room', 'RoomController@index');
    Route::any('/room/add', 'RoomController@add');
    Route::any('/room/store', 'RoomController@store');
    Route::any('/seat', 'SeatController@index');
    Route::any('/user', 'UserController@index');
    Route::any('/user/breach', 'UserController@breach');
    Route::any('/book', 'BookController@index');
    Route::any('/book/expire', 'BookController@expire');
    Route::any('/msg', 'MessageController@index');
    Route::any('/msg/add', 'MessageController@add');
    Route::any('/msg/store', 'MessageController@store');
    Route::any('/count', 'CountController@index');
    Route::any('/sys/qrcode', 'SystemController@qrcode');
    Route::any('/sys/set', 'SystemController@index');
    Route::any('/sys/pwd', 'SystemController@password');

    Route::post('/upload', 'UploadController@upload');
});

Route::post('/server', "ServerController@index");                               //微信接口

Route::get('/broadcast', "BroadcastController@index");                          //群发

Route::get('/users', "UsersController@index");                                  //用户列表
Route::post('/users/info', "UsersController@usersInfo");                        //获取openID集合对应的粉丝信息
Route::get('/users/{openID}', "UsersController@userInfo");                       //获取openID对应的粉丝信息
Route::get('/users/{openID}/remark/{remark}', "UsersController@updateRemark");   //修改openID对应的粉丝备注
Route::get('/users/block', "UsersController@block");                             //拉黑openID（集合）对应的粉丝
Route::get('/users/unblock', "UsersController@unblock");                         //取消拉黑openID（集合）对应的粉丝
Route::get('/users/blacklist', "UsersController@blacklist");                     //查看拉黑粉丝的openID集合

Route::get('/menu', "MenuController@index");
Route::get('/menu/current', "MenuController@current");
Route::get('/menu/create', "MenuController@create");
Route::get('/menu/create/conditional', "MenuController@createConditional");
Route::get('/menu/delete/{menuId?}', "MenuController@delete");

Route::get('/qrcode', 'QRcodeController@index');
