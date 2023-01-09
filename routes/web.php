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

Auth::routes();

//*---------------------------------------------------------------- FRONTEND ----------------------------------------------------------------*//

//** MEMBER LOGIN && LOGOUT **//
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'MemberController@logout');
Route::get('member', 'MemberController@index');
Route::post('member/in_progress', 'MemberController@in_progress');
Route::get('member/create', 'MemberController@create');
Route::post('member/store', 'MemberController@store')->name('member.store');
Route::get('member/edit/{id}', 'MemberController@edit');
Route::put('member/update/{id}', 'MemberController@update');
Route::delete('member/delete/{id}', 'MemberController@destroy');
//** END MEMBER LOGIN && LOGOUT **//

//** REGISTER **//
Route::get('/register', 'HomeController@register');
//** END REGISTER **//

//** INDEX **//
Route::get('/', 'HomeController@index');
Route::get('/index', 'HomeController@index');
//** END INDEX **//

//** ABOUT **//
Route::get('/about', 'HomeController@about');
//** END ABOUT **//

//** ACCOUNT **//
Route::get('/account', 'HomeController@account');
//** END ACCOUNT **//

//** BOOKING **//
Route::get('/booking', 'HomeController@booking');
Route::get('/booking-info/quote={id_quote}&rate={rate}', 'HomeController@booking_info');
//** END BOOKING **//

//** BULKLOGISTICS **//
Route::get('/bulkLogistics', 'HomeController@bulkLogistics');
//** END BULKLOGISTICS **//

//** CONTACT **//
Route::get('/contact', 'HomeController@contact');
//** END CONTACT **//

//** FREIGHTFORWARDING **//
Route::get('/freightForwarding', 'HomeController@freightForwarding');
//** END FREIGHTFORWARDING **//

//** LANDLOGISTICS **//
Route::get('/landLogistics', 'HomeController@landLogistics');
//** END LANDLOGISTICS **//

//** NVOCC **//
Route::get('/nvocc', 'HomeController@nvocc');
//** END NVOCC **//

//** PRICES **//
Route::get('/price', 'HomeController@price');
Route::get('/price-result/get_quote', 'HomeController@price_get')->name('quote.get');
Route::get('/price-result/search', 'HomeController@price_result')->name('quote.result');
//** END PRICES **//

//** SCHEDULE **//
Route::get('/schedule', 'HomeController@schedule');
Route::get('/schedule-result', 'HomeController@schedule_result');
//** END SCHEDULE **//

//** SERVICE **//
Route::get('/service', 'HomeController@service');
Route::get('/service/{service_name}', 'HomeController@service_detail');
//** END SERVICE **//

//** TERMS **//
Route::get('/terms', 'HomeController@terms');
//** END TERMS **//


//*-----------------------------------------------------------------------------------------------------------------------------------------*//

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
    Route::put('/backend/home/banner/update/{id}', 'Backend\HomeBannerController@update'); // update Slide Banner data
    Route::delete('/backend/home/banner/delete/{id}', 'Backend\HomeBannerController@destroy'); // delete Slide Banner data
    //** END SLIDE BANNER **//
    //** LOGISTICS SERVICE TOPICS **//
    Route::get('/backend/home/logistics-service-topics', 'Backend\HomeLogisticsServiceTopicsController@index'); // get all Logistics Service Topics data
    Route::get('/backend/home/logistics-service-topics/create', 'Backend\HomeLogisticsServiceTopicsController@create');  // create Logistics Service Topics view
    Route::post('/backend/home/logistics-service-topics/store', 'Backend\HomeLogisticsServiceTopicsController@store')->name('topics.store'); // store Logistics Service Topics data
    Route::get('/backend/home/logistics-service-topics/edit/{id}', 'Backend\HomeLogisticsServiceTopicsController@edit');   // edit Logistics Service Topics view
    Route::put('/backend/home/logistics-service-topics/update/{id}', 'Backend\HomeLogisticsServiceTopicsController@update'); // update Logistics Service Topics data
    Route::delete('/backend/home/logistics-service-topics/delete/{id}', 'Backend\HomeLogisticsServiceTopicsController@destroy'); // delete Logistics Service Topics data
    //** END LOGISTICS SERVICE TOPICS **//
    //** MAIN SERVICES **//
    Route::get('/backend/home/main-services', 'Backend\HomeMainServicesController@index'); // get all Main Services data
    Route::get('/backend/home/main-services/create', 'Backend\HomeMainServicesController@create');  // create Main Services view
    Route::post('/backend/home/main-services/store', 'Backend\HomeMainServicesController@store')->name('main_services.store'); // store Main Services data
    Route::get('/backend/home/main-services/edit/{id}', 'Backend\HomeMainServicesController@edit');   // edit Main Services view
    Route::put('/backend/home/main-services/update/{id}', 'Backend\HomeMainServicesController@update'); // update Main Services data
    Route::delete('/backend/home/main-services/delete/{id}', 'Backend\HomeMainServicesController@destroy'); // delete Main Services data
    //** END MAIN SERVICES **//
    //** INFINITY CONTENT **//
    Route::get('/backend/home/infinity-content', 'Backend\HomeInfinityContentController@index'); // get all Infinity Content data
    Route::get('/backend/home/infinity-content/create', 'Backend\HomeInfinityContentController@create');  // create Infinity Content view
    Route::post('/backend/home/infinity-content/store', 'Backend\HomeInfinityContentController@store')->name('infinity_content.store'); // store Infinity Content data
    Route::get('/backend/home/infinity-content/edit/{id}', 'Backend\HomeInfinityContentController@edit');   // edit Infinity Content view
    Route::put('/backend/home/infinity-content/update/{id}', 'Backend\HomeInfinityContentController@update'); // update Infinity Content data
    Route::delete('/backend/home/infinity-content/delete/{id}', 'Backend\HomeInfinityContentController@destroy'); // delete Infinity Content data
    //** END INFINITY CONTENT **//
    //** SLIDE IMAGE **//
    Route::get('/backend/home/image', 'Backend\HomeImageController@index'); // get all Slide Image data
    Route::get('/backend/home/image/create', 'Backend\HomeImageController@create');  // create Slide Image view
    Route::post('/backend/home/image/store', 'Backend\HomeImageController@store')->name('image.store'); // store Slide Image data
    Route::get('/backend/home/image/edit/{id}', 'Backend\HomeImageController@edit');   // edit Slide Image view
    Route::put('/backend/home/image/update/{id}', 'Backend\HomeImageController@update'); // update Slide Image data
    Route::delete('/backend/home/image/delete/{id}', 'Backend\HomeImageController@destroy'); // delete Slide Image data
    //** END SLIDE IMAGE **//
    //** OUR CliENTS **//
    Route::get('/backend/home/our-clients', 'Backend\HomeOurClientsController@index'); // get all Our Clients data
    Route::get('/backend/home/our-clients/create', 'Backend\HomeOurClientsController@create');  // create Our Clients view
    Route::post('/backend/home/our-clients/store', 'Backend\HomeOurClientsController@store')->name('logo.store'); // store Our Clients data
    Route::get('/backend/home/our-clients/edit/{id}', 'Backend\HomeOurClientsController@edit');   // edit Our Clients view
    Route::put('/backend/home/our-clients/update/{id}', 'Backend\HomeOurClientsController@update'); // update Our Clients data
    Route::delete('/backend/home/our-clients/delete/{id}', 'Backend\HomeOurClientsController@destroy'); // delete Our Clients data
    //** END OUR CliENTS **//
    ////////////////////<!** END HOME **!>////////////////////

    ////////////////////<!** ABOUT US **!>////////////////////
    //** ABOUT **//
    Route::get('/backend/about', 'Backend\AboutController@index'); // get all About data
    Route::get('/backend/about/create', 'Backend\AboutController@create');  // create About view
    Route::post('/backend/about/store', 'Backend\AboutController@store')->name('about.store'); // store About data
    Route::get('/backend/about/edit/{id}', 'Backend\AboutController@edit');   // edit About view
    Route::put('/backend/about/update/{id}', 'Backend\AboutController@update'); // update About data
    Route::delete('/backend/about/delete/{id}', 'Backend\AboutController@destroy'); // delete About data
    //** END ABOUT **//
    ////////////////////<!** END ABOUT US **!>////////////////////

    ////////////////////<!** SERVICES **!>////////////////////
    //** SERVICES **//
    Route::get('/backend/services', 'Backend\ServicesController@index'); // get all Services data
    Route::get('/backend/services/create', 'Backend\ServicesController@create');  // create Services view
    Route::post('/backend/services/store', 'Backend\ServicesController@store')->name('services.store'); // store Services data
    Route::get('/backend/services/edit/{id}', 'Backend\ServicesController@edit');   // edit Services view
    Route::put('/backend/services/update/{id}', 'Backend\ServicesController@update'); // update Services data
    Route::delete('/backend/services/delete/{id}', 'Backend\ServicesController@destroy'); // delete Services data
    //** END SERVICES **//
    ////////////////////<!** END SERVICES **!>////////////////////

    ////////////////////<!** PRICES **!>////////////////////
    //** PRICES **//
    Route::get('/backend/price', 'PricesController@index'); // get all Prices data
    Route::get('/backend/price/view/{id}', 'PricesController@show');   // View More Prices view
    Route::get('/backend/price/add-detail/{id}', 'PricesController@edit');  // create Add Detail Prices view
    Route::put('/backend/price/add-detail/update/{id}', 'PricesController@update'); // update Add Detail Prices data
    Route::get('/backend/price/reject/{id}', 'PricesController@reject'); // reject Prices data
    //** END PRICES **//
    //** PORT OF lOADING **//
    Route::get('/backend/price/POL', 'Backend\PricesPortOfLoadingController@index'); // get all Port of loading data
    Route::get('/backend/price/POL/create', 'Backend\PricesPortOfLoadingController@create');  // create Port of loading view
    Route::post('/backend/price/POL/store', 'Backend\PricesPortOfLoadingController@store')->name('POL.store'); // store Port of loading data
    Route::get('/backend/price/POL/edit/{id}', 'Backend\PricesPortOfLoadingController@edit');   // edit Port of loading view
    Route::put('/backend/price/POL/update/{id}', 'Backend\PricesPortOfLoadingController@update'); // update Port of loading data
    Route::delete('/backend/price/POL/delete/{id}', 'Backend\PricesPortOfLoadingController@destroy'); // delete Port of loading data
    //** END PORT OF lOADING **//
    //** PORT OF DISCHARGE **//
    Route::get('/backend/price/POD', 'Backend\PricesPortOfDischargeController@index'); // get all Port of discharge data
    Route::get('/backend/price/POD/create', 'Backend\PricesPortOfDischargeController@create');  // create Port of discharge view
    Route::post('/backend/price/POD/store', 'Backend\PricesPortOfDischargeController@store')->name('POD.store'); // store Port of discharge data
    Route::get('/backend/price/POD/edit/{id}', 'Backend\PricesPortOfDischargeController@edit');   // edit Port of discharge view
    Route::put('/backend/price/POD/update/{id}', 'Backend\PricesPortOfDischargeController@update'); // update Port of discharge data
    Route::delete('/backend/price/POD/delete/{id}', 'Backend\PricesPortOfDischargeController@destroy'); // delete Port of discharge data
    //** END PORT OF DISCHARGE **//
    //** EQUIPMENT TYPE **//
    Route::get('/backend/price/equipment-type', 'Backend\PricesEquipmentTypeController@index'); // get all Equipment type data
    Route::get('/backend/price/equipment-type/create', 'Backend\PricesEquipmentTypeController@create');  // create Equipment type view
    Route::post('/backend/price/equipment-type/store', 'Backend\PricesEquipmentTypeController@store')->name('EquipmentType.store'); // store Equipment type data
    Route::get('/backend/price/equipment-type/edit/{id}', 'Backend\PricesEquipmentTypeController@edit');   // edit Equipment type view
    Route::put('/backend/price/equipment-type/update/{id}', 'Backend\PricesEquipmentTypeController@update'); // update Equipment type data
    Route::delete('/backend/price/equipment-type/delete/{id}', 'Backend\PricesEquipmentTypeController@destroy'); // delete Equipment type data
    //** END EQUIPMENT TYPE **//
    //** COMMODITY **//
    Route::get('/backend/price/commodity', 'Backend\PricesCommodityController@index'); // get all Commodity data
    Route::get('/backend/price/commodity/create', 'Backend\PricesCommodityController@create');  // create Commodity view
    Route::post('/backend/price/commodity/store', 'Backend\PricesCommodityController@store')->name('commodity.store'); // store Commodity data
    Route::get('/backend/price/commodity/edit/{id}', 'Backend\PricesCommodityController@edit');   // edit Commodity view
    Route::put('/backend/price/commodity/update/{id}', 'Backend\PricesCommodityController@update'); // update Commodity data
    Route::delete('/backend/price/commodity/delete/{id}', 'Backend\PricesCommodityController@destroy'); // delete Commodity data
    //** END COMMODITY **//
    ////////////////////<!** END PRICES **!>////////////////////

    ////////////////////<!** BOOKING **!>////////////////////
    //** BOOKING **//
    Route::get('/backend/booking', 'BookingController@index'); // get all Booking data
    Route::get('/backend/booking/edit/{id}', 'BookingController@edit');   // edit Booking view
    Route::put('/backend/booking/update/{id}', 'BookingController@update'); // update Booking data
    //** END BOOKING **//
    //** STANDARD RATE **//
    Route::get('/backend/booking/standard-rate', 'Backend\BookingStandardRateController@index'); // get all Standard Rate data
    Route::get('/backend/booking/standard-rate/create', 'Backend\BookingStandardRateController@create');  // create Standard Rate view
    Route::post('/backend/booking/standard-rate/store', 'Backend\BookingStandardRateController@store')->name('rate.store'); // store Standard Rate data
    Route::get('/backend/booking/standard-rate/edit/{id}', 'Backend\BookingStandardRateController@edit');   // edit Standard Rate view
    Route::put('/backend/booking/standard-rate/update/{id}', 'Backend\BookingStandardRateController@update'); // update Standard Rate data
    Route::delete('/backend/booking/standard-rate/delete/{id}', 'Backend\BookingStandardRateController@destroy'); // delete Standard Rate data
    //** END STANDARD RATE **//
    //** TERM **//
    Route::get('/backend/booking/term', 'Backend\BookingTermController@index'); // get all Term data
    Route::get('/backend/booking/term/create', 'Backend\BookingTermController@create');  // create Term view
    Route::post('/backend/booking/term/store', 'Backend\BookingTermController@store')->name('term.store'); // store Term data
    Route::get('/backend/booking/term/edit/{id}', 'Backend\BookingTermController@edit');   // edit Term view
    Route::put('/backend/booking/term/update/{id}', 'Backend\BookingTermController@update'); // update Term data
    Route::delete('/backend/booking/term/delete/{id}', 'Backend\BookingTermController@destroy'); // delete Term data
    //** END TERM **//
    ////////////////////<!** END BOOKING **!>////////////////////

    ////////////////////<!** CONTACT US **!>////////////////////
    //** CONTACT **//
    Route::get('/backend/contact', 'Backend\ContactController@index'); // get all Contact data
    Route::get('/backend/contact/create', 'Backend\ContactController@create');  // create Contact view
    Route::post('/backend/contact/store', 'Backend\ContactController@store')->name('contact.store'); // store Contact data
    Route::get('/backend/contact/edit/{id}', 'Backend\ContactController@edit');   // edit Contact view
    Route::put('/backend/contact/update/{id}', 'Backend\ContactController@update'); // update Contact data
    Route::delete('/backend/contact/delete/{id}', 'Backend\ContactController@destroy'); // delete Contact data
    //** END CONTACT **//
    ////////////////////<!** END CONTACT US **!>////////////////////

    ////////////////////<!** MANAGEMENT **!>////////////////////
    //** MEMBER **//
    Route::get('/backend/member', 'Backend\MemberController@index'); // get all Services data
    Route::get('/backend/member/create', 'Backend\MemberController@create');  // create Services view
    Route::post('/backend/member/store', 'Backend\MemberController@store')->name('member.store'); // store Services data
    Route::get('/backend/member/edit/{id}', 'Backend\MemberController@edit');   // edit Services view
    Route::put('/backend/member/update/{id}', 'Backend\MemberController@update'); // update Services data
    Route::delete('/backend/member/delete/{id}', 'Backend\MemberController@destroy'); // delete Services data
    //** END MEMBER **//
    ////////////////////<!** END MANAGEMENT **!>////////////////////
});

//*-----------------------------------------------------------------------------------------------------------------------------------------*//
