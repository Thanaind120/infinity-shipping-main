<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/clc', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    // Artisan::call('optimize');
    // Artisan::call('clear-compiled');
    // Artisan::call('view:clear');
    // session()->forget('key');
    return "Cleared!";
});

// Route::get('/', function () {
//     // return view('welcome');
//     return view('layouts/backend/index');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/register', 'HomeController@register');
Route::get('/login', 'HomeController@login');
Route::get('/about', 'HomeController@about');
Route::get('/account', 'HomeController@account');
Route::get('/booking-info', 'HomeController@booking_info');
Route::get('/booking', 'HomeController@booking');
Route::get('/bulkLogistics', 'HomeController@bulkLogistics');
Route::get('/contact', 'HomeController@contact');
Route::get('/freightForwarding', 'HomeController@freightForwarding');
Route::get('/landLogistics', 'HomeController@landLogistics');
Route::get('/nvocc', 'HomeController@nvocc');
Route::get('/price', 'HomeController@price');
Route::get('/schedule-result', 'HomeController@schedule_result');
Route::get('/schedule', 'HomeController@schedule');
Route::get('/service', 'HomeController@service');
Route::get('/terms', 'HomeController@terms');

//*---------------------------------------------------------------- BACKEND ----------------------------------------------------------------*//

Route::get('/backend/login', 'LoginController@login');
Route::post('/backend/login', 'LoginController@in_progress')->name('backoffice.login');
Route::get('/backend/logout', 'LoginController@logout')->name('backoffice.logout');

Route::group(['middleware' => ['web', 'auth']], function () {
    ////////////////////<!** HOME **!>////////////////////
    //** BANNER **//
    Route::get('/backend/home/banner', 'HomeBannerController@index'); // get all Banner data
    Route::get('/backend/home/banner/create', 'HomeBannerController@create');  // create Banner view
    Route::post('/backend/home/banner/store', 'HomeBannerController@store')->name('banner.store'); // store Banner data
    Route::get('/backend/home/banner/edit/{id}', 'HomeBannerController@edit');   // edit Banner view
    Route::put('/backend/home/banner/update/{id}', 'HomeBannerController@update'); //update Banner data
    Route::delete('/backend/home/banner/delete/{id}', 'HomeBannerController@destroy'); //delete Banner data
    //** END BANNER **//
    ////////////////////<!** END HOME **!>////////////////////
});

//*-----------------------------------------------------------------------------------------------------------------------------------------*//