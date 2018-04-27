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

Route::get('/inscription', function () {
    return view('auth/register');
});

Route::get('/home', 'HomeController@index')->name('home');

/*
/*Routes articles*/
Route::get('/billet', 'ArticleController@index')->name(('article.index'));
Route::get('/billet/new', 'ArticleController@create')->name('article.create');
Route::post('/post', 'ArticleController@store')->name('article.store');
Route::get('/billet/{id}/edit', 'ArticleController@edit')->name('article.edit');
Route::put('/billet/{id}/update', 'ArticleController@update')->name('article.update');
Route::delete('/billet/{id}/delete', 'ArticleController@destroy')->name('article.destroy');

/*Routes comments*/
Route::get('/billet/{id}', 'ArticleController@show')->name('article.show');
Route::post('/comment/{article}', 'CommentController@store')->name('comment.store');

/*Routes Authentification*/
Auth::routes();


/*Routes admin */
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin','AdminController@index')->name('admin.index');
    Route::get('/admin/users', 'AdminController@showUser')->name('admin.users');
    Route::get('/admin/billets', 'AdminController@showArticle')->name('admin.articles');
    Route::get('/admin/comments', 'AdminController@showComment')->name('admin.comments');
});
