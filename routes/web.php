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
Route::post('/price/get_quote', 'PricesController@store')->name('quote.store');
Route::get('/schedule-result', 'HomeController@schedule_result');
Route::get('/schedule', 'HomeController@schedule');
Route::get('/service', 'HomeController@service');
Route::get('/service/{service_name}', 'HomeController@service_detail');
Route::get('/terms', 'HomeController@terms');


//** MEMBER **//
Route::get('member', 'MemberController@index'); // get all Slide member data
Route::post('member/in_progress', 'MemberController@in_progress'); // get all Slide member data
Route::get('member/create', 'MemberController@create');  // create Slide member view
Route::post('member/store', 'MemberController@store')->name('member.store'); // store Slide member data
Route::get('member/edit/{id}', 'MemberController@edit');   // edit Slide member view
Route::put('member/update/{id}', 'MemberController@update'); //update Slide member data
Route::delete('member/delete/{id}', 'MemberController@destroy'); //delete Slide member data
//** END MEMBER **//

//*---------------------------------------------------------------- BACKEND ----------------------------------------------------------------*//

Route::get('/backend/login', 'LoginController@login');
Route::post('/backend/login', 'LoginController@in_progress')->name('backoffice.login');
Route::get('/backend/logout', 'LoginController@logout')->name('backoffice.logout');

Route::group(['middleware' => ['web', 'auth']], function () {
    ////////////////////<!** HOME **!>////////////////////
    //** SLIDE BANNER **//
    Route::get('/backend/home/banner', 'Backend\HomeBannerController@index'); // get all Slide Banner data
    Route::get('/backend/home/banner/create', 'Backend\HomeBannerController@create');  // create Slide Banner view
    Route::post('/backend/home/banner/store', 'Backend\HomeBannerController@store')->name('banner.store'); // store Slide Banner data
    Route::get('/backend/home/banner/edit/{id}', 'Backend\HomeBannerController@edit');   // edit Slide Banner view
    Route::put('/backend/home/banner/update/{id}', 'Backend\HomeBannerController@update'); //update Slide Banner data
    Route::delete('/backend/home/banner/delete/{id}', 'Backend\HomeBannerController@destroy'); //delete Slide Banner data
    //** END SLIDE BANNER **//
    //** LOGISTICS SERVICE TOPICS **//
    Route::get('/backend/home/logistics-service-topics', 'Backend\HomeLogisticsServiceTopicsController@index'); // get all Logistics Service Topics data
    Route::get('/backend/home/logistics-service-topics/create', 'Backend\HomeLogisticsServiceTopicsController@create');  // create Logistics Service Topics view
    Route::post('/backend/home/logistics-service-topics/store', 'Backend\HomeLogisticsServiceTopicsController@store')->name('topics.store'); // store Logistics Service Topics data
    Route::get('/backend/home/logistics-service-topics/edit/{id}', 'Backend\HomeLogisticsServiceTopicsController@edit');   // edit Logistics Service Topics view
    Route::put('/backend/home/logistics-service-topics/update/{id}', 'Backend\HomeLogisticsServiceTopicsController@update'); //update Logistics Service Topics data
    Route::delete('/backend/home/logistics-service-topics/delete/{id}', 'Backend\HomeLogisticsServiceTopicsController@destroy'); //delete Logistics Service Topics data
    //** END LOGISTICS SERVICE TOPICS **//
    //** MAIN SERVICES **//
    Route::get('/backend/home/main-services', 'Backend\HomeMainServicesController@index'); // get all Main Services data
    Route::get('/backend/home/main-services/create', 'Backend\HomeMainServicesController@create');  // create Main Services view
    Route::post('/backend/home/main-services/store', 'Backend\HomeMainServicesController@store')->name('main_services.store'); // store Main Services data
    Route::get('/backend/home/main-services/edit/{id}', 'Backend\HomeMainServicesController@edit');   // edit Main Services view
    Route::put('/backend/home/main-services/update/{id}', 'Backend\HomeMainServicesController@update'); //update Main Services data
    Route::delete('/backend/home/main-services/delete/{id}', 'Backend\HomeMainServicesController@destroy'); //delete Main Services data
    //** END MAIN SERVICES **//
    //** INFINITY CONTENT **//
    Route::get('/backend/home/infinity-content', 'Backend\HomeInfinityContentController@index'); // get all Infinity Content data
    Route::get('/backend/home/infinity-content/create', 'Backend\HomeInfinityContentController@create');  // create Infinity Content view
    Route::post('/backend/home/infinity-content/store', 'Backend\HomeInfinityContentController@store')->name('infinity_content.store'); // store Infinity Content data
    Route::get('/backend/home/infinity-content/edit/{id}', 'Backend\HomeInfinityContentController@edit');   // edit Infinity Content view
    Route::put('/backend/home/infinity-content/update/{id}', 'Backend\HomeInfinityContentController@update'); //update Infinity Content data
    Route::delete('/backend/home/infinity-content/delete/{id}', 'Backend\HomeInfinityContentController@destroy'); //delete Infinity Content data
    //** END INFINITY CONTENT **//
    //** SLIDE IMAGE **//
    Route::get('/backend/home/image', 'Backend\HomeImageController@index'); // get all Slide Image data
    Route::get('/backend/home/image/create', 'Backend\HomeImageController@create');  // create Slide Image view
    Route::post('/backend/home/image/store', 'Backend\HomeImageController@store')->name('image.store'); // store Slide Image data
    Route::get('/backend/home/image/edit/{id}', 'Backend\HomeImageController@edit');   // edit Slide Image view
    Route::put('/backend/home/image/update/{id}', 'Backend\HomeImageController@update'); //update Slide Image data
    Route::delete('/backend/home/image/delete/{id}', 'Backend\HomeImageController@destroy'); //delete Slide Image data
    //** END SLIDE IMAGE **//
    //** OUR CliENTS **//
    Route::get('/backend/home/our-clients', 'Backend\HomeOurClientsController@index'); // get all Our Clients data
    Route::get('/backend/home/our-clients/create', 'Backend\HomeOurClientsController@create');  // create Our Clients view
    Route::post('/backend/home/our-clients/store', 'Backend\HomeOurClientsController@store')->name('logo.store'); // store Our Clients data
    Route::get('/backend/home/our-clients/edit/{id}', 'Backend\HomeOurClientsController@edit');   // edit Our Clients view
    Route::put('/backend/home/our-clients/update/{id}', 'Backend\HomeOurClientsController@update'); //update Our Clients data
    Route::delete('/backend/home/our-clients/delete/{id}', 'Backend\HomeOurClientsController@destroy'); //delete Our Clients data
    //** END OUR CliENTS **//
    ////////////////////<!** END HOME **!>////////////////////
    ////////////////////<!** ABOUT US **!>////////////////////
    //** ABOUT **//
    Route::get('/backend/about', 'Backend\AboutController@index'); // get all About data
    Route::get('/backend/about/create', 'Backend\AboutController@create');  // create About view
    Route::post('/backend/about/store', 'Backend\AboutController@store')->name('about.store'); // store About data
    Route::get('/backend/about/edit/{id}', 'Backend\AboutController@edit');   // edit About view
    Route::put('/backend/about/update/{id}', 'Backend\AboutController@update'); //update About data
    Route::delete('/backend/about/delete/{id}', 'Backend\AboutController@destroy'); //delete About data
    //** END ABOUT **//
    ////////////////////<!** END ABOUT US **!>////////////////////
    ////////////////////<!** SERVICES **!>////////////////////
    //** SERVICES **//
    Route::get('/backend/services', 'Backend\ServicesController@index'); // get all Services data
    Route::get('/backend/services/create', 'Backend\ServicesController@create');  // create Services view
    Route::post('/backend/services/store', 'Backend\ServicesController@store')->name('services.store'); // store Services data
    Route::get('/backend/services/edit/{id}', 'Backend\ServicesController@edit');   // edit Services view
    Route::put('/backend/services/update/{id}', 'Backend\ServicesController@update'); //update Services data
    Route::delete('/backend/services/delete/{id}', 'Backend\ServicesController@destroy'); //delete Services data
    //** END SERVICES **//
    ////////////////////<!** END SERVICES **!>////////////////////
    ////////////////////<!** CONTACT US **!>////////////////////
    //** CONTACT **//
    Route::get('/backend/contact', 'Backend\ContactController@index'); // get all Contact data
    Route::get('/backend/contact/create', 'Backend\ContactController@create');  // create Contact view
    Route::post('/backend/contact/store', 'Backend\ContactController@store')->name('contact.store'); // store Contact data
    Route::get('/backend/contact/edit/{id}', 'Backend\ContactController@edit');   // edit Contact view
    Route::put('/backend/contact/update/{id}', 'Backend\ContactController@update'); //update Contact data
    Route::delete('/backend/contact/delete/{id}', 'Backend\ContactController@destroy'); //delete Contact data
    //** END CONTACT **//
    ////////////////////<!** END CONTACT US **!>////////////////////

    ////////////////////<!** MEMBER **!>////////////////////
    //** MEMBER **//
    Route::get('/backend/member', 'Backend\MemberController@index'); // get all Services data
    Route::get('/backend/member/create', 'Backend\MemberController@create');  // create Services view
    Route::post('/backend/member/store', 'Backend\MemberController@store')->name('member.store'); // store Services data
    Route::get('/backend/member/edit/{id}', 'Backend\MemberController@edit');   // edit Services view
    Route::put('/backend/member/update/{id}', 'Backend\MemberController@update'); //update Services data
    Route::delete('/backend/member/delete/{id}', 'Backend\MemberController@destroy'); //delete Services data
    //** END MEMBER **//
    ////////////////////<!** END MEMBER **!>////////////////////


});

//*-----------------------------------------------------------------------------------------------------------------------------------------*//