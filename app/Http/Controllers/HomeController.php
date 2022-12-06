<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AboutModel;
use App\Models\Contact;
use App\Models\HomeBannerModel;
use App\Models\HomeLogisticsServiceTopicsModel;
use App\Models\HomeInfinityContentModel;
use App\Models\HomeImageModel;
use App\Models\HomeMainServicesModel;
use App\Models\HomeOurClientsModel;
use App\Models\Services;
use App\Models\PricesModel;

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

        $banner = HomeBannerModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $logistics_service_topics = HomeLogisticsServiceTopicsModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $services = Services::where('status', 1)->orderBy('id', 'DESC')->get();
        $sum_main_services = HomeMainServicesModel::select(DB::raw('SUM(status) as sum_main_services'))->where('status', 1)->get();
        $main_services = HomeMainServicesModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $infinity_content = HomeInfinityContentModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $image = HomeImageModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $logo = HomeOurClientsModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $data = array(
            'banner' => $banner,
            'logistics_service_topics' => $logistics_service_topics,
            'services' => $services,
            'sum_main_services' => $sum_main_services,
            'main_services' => $main_services,
            'infinity_content' => $infinity_content,
            'image' => $image,
            'logo' => $logo,
        );
        return view('layouts/frontend/index', $data);
    }

    public function about()
    {
        $about = AboutModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $data = array(
            'about' => $about,
        );
        return view('layouts/frontend/about', $data);
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

    public function price(Request $request)
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
        $services = Services::where('status', 1)->orderBy('id', 'DESC')->get();
        $contact = Contact::find(1);
        $data = array(
            'services' => $services,
            'contact' => $contact,
        );
        return view('layouts/frontend/service', $data);
    }
    public function service_detail($service_name)
    {
        $ServicesAll =  Services::all();
        foreach ($ServicesAll as $item) {
            // เช็คค่า ถ้ามีช่องว่าให้มันเขียนทับไม่ให้มีช่องว่าง
            $service_replace = $string = str_replace(' ', '', $item->service_name);
            if ($service_replace == $service_name) {
                $id = $item->id;
            }
        }
        $services = Services::find($id);
        $contact = Contact::find(1);
        $data = array(

            'services' => $services,
            'contact' => $contact,
        );
        return view('layouts/frontend/service_detail', $data);
    }

    public function terms()
    {
        return view('layouts/frontend/terms');
    }
}
