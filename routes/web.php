<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('posts/test','AdminController@test');
Route::get('posts/sendmail','AdminController@sendmail');
Route::get('/', function () {
    return view('welcome');
});
Route::get('posts/person/show/{age}','AdminController@show');
Route::get('posts/cannot',function(){
    return view('posts/cannot');
});






Auth::routes(['verify'=>true]);
Route::get('/home','HomeController@index')->name('home')->middleware('auth');
Route::get('posts/everyone','AdminController@everyone');

Route::middleware('auth','verified')->group(function(){
    Route::get('posts/person','AdminController@person');
    Route::get('posts/dashboard','AdminController@dashboard');
    Route::get('posts/error','AdminController@error');
    Route::get('posts/post_error','AdminController@posterror');
    Route::resource('posts','PostController',['only'=>['index','show','create','store']]);
    Route::get('posts/edit/{id}','PostController@edit')->middleware('CheckUser');
    Route::post('posts/edit','PostController@update');
    Route::GET('posts/delete/{id}','PostController@destroy')->middleware('CheckUser');
    
    

});






