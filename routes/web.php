<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'ProfileController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/grocery', 'GroceryController@index')->name('grocery');
Route::post('/grocery', 'GroceryController@index');

Route::get('/keluar', function () {
    Auth::logout();
    return redirect()->route('homepage.index');
})->name('keluar');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::get('/testing', function () {
    $ezpay = config('app.ezpay') . "<br>";
    $cilik = config('app.cilik') . "<br>";
    $smart = config('app.smart') . "<br>";
    $jogja = config('app.jogja') . "<br>";
    $tebar = config('app.tebar') . "<br>";
    $sinao = config('app.sinao') . "<br>";

    $teks = $ezpay . $cilik . $smart . $jogja . $tebar . $sinao;
    return $teks;
});
