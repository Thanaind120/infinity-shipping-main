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
    Route::get('/backend/home/banner', 'Backend\HomeBannerController@index'); // get all Banner data
    Route::get('/backend/home/banner/create', 'Backend\HomeBannerController@create');  // create Banner view
    Route::post('/backend/home/banner/store', 'Backend\HomeBannerController@store')->name('banner.store'); // store Banner data
    Route::get('/backend/home/banner/edit/{id}', 'Backend\HomeBannerController@edit');   // edit Banner view
    Route::put('/backend/home/banner/update/{id}', 'Backend\HomeBannerController@update'); //update Banner data
    Route::delete('/backend/home/banner/delete/{id}', 'Backend\HomeBannerController@destroy'); //delete Banner data
    //** END BANNER **//

    //** LOGISTICS SERVICE TOPICS **//
    Route::get('/backend/home/logistics-service-topics', 'Backend\HomeLogisticsServiceTopicsController@index'); // get all Logistics Service Topics data
    Route::get('/backend/home/logistics-service-topics/create', 'Backend\HomeLogisticsServiceTopicsController@create');  // create Logistics Service Topics view
    Route::post('/backend/home/logistics-service-topics/store', 'Backend\HomeLogisticsServiceTopicsController@store')->name('topics.store'); // store Logistics Service Topics data
    Route::get('/backend/home/logistics-service-topics/edit/{id}', 'Backend\HomeLogisticsServiceTopicsController@edit');   // edit Logistics Service Topics view
    Route::put('/backend/home/logistics-service-topics/update/{id}', 'Backend\HomeLogisticsServiceTopicsController@update'); //update Logistics Service Topics data
    Route::delete('/backend/home/logistics-service-topics/delete/{id}', 'Backend\HomeLogisticsServiceTopicsController@destroy'); //delete Logistics Service Topics data
    //** END LOGISTICS SERVICE TOPICS **//
    ////////////////////<!** END HOME **!>////////////////////

    //** SERVICES **//
    Route::get('/backend/services', 'Backend\ServicesController@index'); // get all Banner data
    Route::get('/backend/services/create', 'Backend\ServicesController@create');  // create Banner view
    Route::post('/backend/services/store', 'Backend\ServicesController@store')->name('services.store'); // store Banner data
    Route::get('/backend/services/edit/{id}', 'Backend\ServicesController@edit');   // edit Banner view
    Route::put('/backend/services/update/{id}', 'Backend\ServicesController@update'); //update Banner data
    Route::delete('/backend/services/delete/{id}', 'Backend\ServicesController@destroy'); //delete Banner data
    //** END SERVICES **//

    //** CONTACT **//
    Route::get('/backend/contact', 'Backend\ServicesController@index'); // get all Banner data
    Route::get('/backend/contact/create', 'Backend\ServicesController@create');  // create Banner view
    Route::post('/backend/contact/store', 'Backend\ServicesController@store')->name('contact.store'); // store Banner data
    Route::get('/backend/contact/edit/{id}', 'Backend\ServicesController@edit');   // edit Banner view
    Route::put('/backend/contact/update/{id}', 'Backend\ServicesController@update'); //update Banner data
    Route::delete('/backend/contact/delete/{id}', 'Backend\ServicesController@destroy'); //delete Banner data
    //** END CONTACT **//





});

//*-----------------------------------------------------------------------------------------------------------------------------------------*//