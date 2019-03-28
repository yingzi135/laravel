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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/index',function(){
// 	echo '测试';
// });
//带参数的路由
// Route::get('/goods/{id}',function($id){
// 	echo $id;
// });
//后台模块
Route::resource('pic','admin\picController');

