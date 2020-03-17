<?php

use App\Http\Middleware\IsAdmin;
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
Route::middleware('is_admin')->namespace('Back')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/main','AdminController@index')->name('main');
    Route::get('/contact','AdminController@contact')->name('contact');
    Route::post('/cdelete/{id}','AdminController@cdelete')->name('cdelete');
    Route::resource('posts','PostController');
    Route::resource('categories','CategoryController');
    Route::resource('comments','CommentsController');
    Route::resource('replies','RepliesController');
    Route::post('/fetch','CategoryController@fetch')->name('fetch');
    Route::post('/approve/{id}','CommentsController@approve')->name('approve');
    Route::post('/rapprove/{id}','RepliesController@rapprove')->name('rapprove');
});



Auth::routes();



Route::get('/','Front\FrontController@index')->name('home');
Route::get('/home','Front\FrontController@index')->name('homepage');
Route::get('/about','Front\FrontController@about')->name('about');

Route::post('/search','Front\FrontController@search')->name('search');
Route::post('/cfetch','Front\FrontController@cfetch')->name('cfetch');
Route::get('/contact','Front\ContactController@contact')->name('contact');
Route::post('/comment','Front\ContactController@comment')->name('comment');
Route::post('/contact','Front\ContactController@contactus')->name('contactus');
Route::get('/{category}','Front\FrontController@category')->name('category');
Route::get('/{category}/{single}','Front\FrontController@single')->name('single');
