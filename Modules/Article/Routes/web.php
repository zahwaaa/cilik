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

Route::middleware('auth')->group(function(){
    Route::middleware('can:admin')->prefix('admin')->group(function(){
        Route::name('article.')->prefix('article')->group(function() {
            Route::get('/', 'ArticleController@index')->name('index');
            Route::post('/', 'ArticleController@index')->name('index');
            Route::get('/published', 'ArticleController@index_published')->name('published');
            Route::post('/published', 'ArticleController@index_published')->name('published');
            Route::get('/rejected', 'ArticleController@index_rejected')->name('rejected');
            Route::post('/rejected', 'ArticleController@index_rejected')->name('rejected');
            Route::get('/deleted', 'ArticleController@index_deleted')->name('deleted');
            Route::post('/deleted', 'ArticleController@index_deleted')->name('deleted');
            Route::get('/comments', 'ArticleController@comments')->name('comments');
            Route::post('/comments', 'ArticleController@comments')->name('comments');
        });

        Route::name('category.')->prefix('category')->group(function() {
            Route::get('/', 'ArticleController@category')->name('index');
            Route::post('/', 'ArticleController@category')->name('index');
        });
    });

    Route::middleware('can:member')->prefix('member')->group(function(){
        Route::name('article_member.')->prefix('articles')->group(function() {
            Route::get('/new', 'ArticleController@article_member')->name('index');
            Route::post('/new', 'ArticleController@article_member')->name('index');
            Route::get('/published', 'ArticleController@article_published')->name('published');
            Route::post('/published', 'ArticleController@article_published')->name('published');
            Route::get('/rejected', 'ArticleController@article_rejected')->name('rejected');
            Route::post('/rejected', 'ArticleController@article_rejected')->name('rejected');
            Route::get('/deleted', 'ArticleController@article_deleted')->name('deleted');
            Route::post('/deleted', 'ArticleController@article_deleted')->name('deleted');
        });
    });

    Route::post('/komen/{article}', 'ArticleController@comment')->name('comment');
});

