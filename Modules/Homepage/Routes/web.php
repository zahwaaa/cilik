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

Route::name('homepage.')->group(function() {
    Route::get('/', 'HomeController@index')->name('index');
    Route::post('/cari', 'HomeController@cari')->name('cari');

    // produk
    Route::get('/category/{productcategory:slug}', 'HomepageController@productcategory')->name('productcategory');
    Route::get('/product/{product:slug}', 'HomepageController@product')->name('product');

    // artikel
    Route::get('/kategori/{articlecategory:slug}', 'HomeController@articlecategory')->name('articlecategory');
    Route::get('/baca/{article:slug}', 'HomeController@article')->name('article');

    // kompetisi
    Route::get('/competitions', 'HomeController@competitions')->name('competitions');
    Route::get('/competition/{competition}', 'HomeController@competition')->name('competition');
    Route::post('/competition/{competition}', 'HomepageController@competition_store')->name('competition_store')->middleware('auth');

    Route::middleware('auth')->group(function(){
        Route::post('/product/{product:slug}', 'HomepageController@product_store')->name('product_store');
        Route::get('/cart', 'HomepageController@cart')->name('cart');
        Route::get('/cart/{productbuy}', 'HomepageController@cart_hapus')->name('cart_hapus');
        Route::post('/cart', 'HomepageController@cart_update')->name('cart_update');
        Route::get('/checkout', 'HomepageController@checkout')->name('checkout');
        Route::post('/checkout', 'HomepageController@check_out')->name('check_out');
    });
});
