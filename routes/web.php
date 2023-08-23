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

Route::get('/','HomeController@index')->name('home');

Route::group(['namespace' => 'Posts'], function () {
    Route::get("/posts", 'IndexController')->name("post.index");
    Route::get('/posts/create', 'CreateController')->name('post.store');

    Route::post('/posts/create', 'StoreController')->name('post.create');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');

    Route::get('/posts/update', 'UpdateController');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'],  function () {
    Route::group(['namespace' => 'Posts'], function () {
        Route::get('/posts', 'IndexController')->name('admin.post.index');
        Route::get('/posts/create', 'CreateController')->name('admin.post.create');
        Route::post('/posts/create', 'StoreController')->name('admin.post.create');
    });
});

Route::get('/posts/first-or-create', 'PostController@firstOrCreate');

Route::get("/main", 'MainController@index')->name("main.index");

Route::get("/contacts", 'ContactsController@index')->name("contacts.index");

Route::get("/about", 'AboutController@index')->name("about.index");




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
