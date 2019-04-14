<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::group(['middleware'=>'login'],function (){
        Route::get('index','IndexController@index');
        Route::get('welcome','IndexController@welcome');
        Route::match(['post','get'],'lesson/index','LessonController@index');
        Route::match(['post','get'],'lesson/add','LessonController@add');
        Route::post('lesson/uploadimg','LessonController@uploadimg');
        Route::get('lesson/play/{lesson}','LessonController@play');
        Route::match(['post','get'],'lesson/update/{lesson}','LessonController@update');
        Route::post('lesson/del','LessonController@del');
        Route::get('logout','ManagerController@logout');
        Route::get('role/index','RoleController@index');
        Route::match(['post','get'],'role/update/{role}','RoleController@update');
    });
    Route::get('login','ManagerController@login');
    Route::post('login_check','ManagerController@login_check');
    Route::get('test','TestController@index');

});
Route::group(['prefix'=>'home','namespace'=>'Home'],function (){
    Route::get('index','IndexController@index');
    Route::get('course/detail/{course}','CourseController@detail');
    Route::get('cart/add/{course}','CartController@add');
    Route::get('cart/index','CartController@index');
    Route::get('order/add','OrderController@add');
});
