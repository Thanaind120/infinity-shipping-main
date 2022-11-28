<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function register()
    {
        return view('layouts/frontend/register', [
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    public function login()
    {
        return view('layouts/frontend/login');
    }

    public function index()
    {
        return view('layouts/frontend/index');
    }

    public function about()
    {
        return view('layouts/frontend/about');
    }

    public function account()
    {
        return view('layouts/frontend/account');
    }

    public function booking_info()
    {
        return view('layouts/frontend/booking-info');
    }

    public function booking()
    {
        return view('layouts/frontend/booking');
    }

    public function bulkLogistics()
    {
        return view('layouts/frontend/bulkLogistics');
    }

    public function contact()
    {
        return view('layouts/frontend/contact');
    }

    public function freightForwarding()
    {
        return view('layouts/frontend/freightForwarding');
    }

    public function landLogistics()
    {
        return view('layouts/frontend/landLogistics');
    }

    public function nvocc()
    {
        return view('layouts/frontend/nvocc');
    }

    public function price()
    {
        return view('layouts/frontend/price');
    }

    public function schedule_result()
    {
        return view('layouts/frontend/schedule-result');
    }

    public function schedule()
    {
        return view('layouts/frontend/schedule');
    }

    public function service()
    {
        return view('layouts/frontend/service');
    }

    public function terms()
    {
        return view('layouts/frontend/terms');
    }
}
