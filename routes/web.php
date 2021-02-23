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

// Route::get('/welcome',function() {
//     return view('welcome');
// });

use Illuminate\Support\Facades\Auth;

Auth::routes();

//トップページの表示
Route::get('/', 'HomeController@index')->name('home');

//ユーザー情報取得(TriggerComponent.vueでの情報取得用)
Route::get('ajax/get/user', 'Ajax\UserController@index');

//todo表示とTodoComponent.vueでの情報取得用
Route::group(['middleware' => ['auth']], function () {   
    //todo(表示)
    Route::get('/todos', 'TodoController@index')->name('todo.index');
    //todo(取得)
    Route::get('ajax/get', 'Ajax\TodoController@index');
    //todo(登録)
    Route::post('ajax/add', 'Ajax\TodoController@add');
    //todo(編集)
    Route::post('ajax/edit/{id}', 'Ajax\TodoController@edit');
    //todo(削除)
    Route::delete('ajax/delete/{id}', 'Ajax\TodoController@delete');
});



