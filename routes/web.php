<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/posts", 'PostController@index')->name("posts.index");
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/update', 'PostController@update');
Route::get('/posts/delete', 'PostController@delete');
Route::get('/posts/first-or-create', 'PostController@firstOrCreate');

Route::get("/main", 'MainController@index')->name("main.index");

Route::get("/contacts", 'ContactsController@index')->name("contacts.index");

Route::get("/about", 'AboutController@index')->name("about.index");



