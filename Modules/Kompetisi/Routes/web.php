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

Route::name('kompetisi.')->prefix('kompetisi')->group(function() {
    Route::middleware('can:admin')->prefix('admin')->name('admin.')->group(function(){
        Route::get('/', 'KompetisiController@index')->name('index');
        Route::post('/', 'KompetisiController@index');
        Route::get('/members/{id}', 'KompetisiController@members')->name('members');
        Route::post('/members/{id}', 'KompetisiController@members');

    });
    Route::middleware('can:member')->prefix('member')->name('member.')->group(function(){
        Route::get('/member', 'KompetisiController@member')->name('index');
        Route::post('/member', 'KompetisiController@member');

    });
});
