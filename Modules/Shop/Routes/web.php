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
        Route::name('shop.')->prefix('shop')->group(function() {
            Route::get('/category', 'ShopController@category')->name('category');
            Route::post('/category', 'ShopController@category')->name('category');
            Route::get('/', 'ShopController@index')->name('index');
            Route::post('/', 'ShopController@index')->name('index');
            Route::get('/images/{product}', 'ShopController@images')->name('images');
            Route::post('/images/{product}', 'ShopController@images')->name('images');
            Route::get('/list', 'ShopController@list')->name('list');
            Route::post('/list', 'ShopController@list')->name('list');
            Route::get('/products/{kode}', 'ShopController@products')->name('products');
            Route::post('/products/{kode}', 'ShopController@products')->name('products');
        });
    });

    Route::middleware('can:member')->prefix('member')->group(function(){
        Route::name('shop.')->prefix('shop')->group(function() {
            Route::get('/daftar', 'ShopController@daftar')->name('daftar');
            Route::post('/daftar', 'ShopController@daftar')->name('daftar');
            Route::get('/products/{kode}', 'ShopController@products')->name('produk');
            Route::post('/products/{kode}', 'ShopController@products')->name('produk');
        });
    });
});
