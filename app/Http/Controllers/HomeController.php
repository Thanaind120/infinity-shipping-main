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
use App\Models\BookingTermModel;
use App\Models\BookingModel;
use App\Models\Contact;
use App\Models\ContactSales;
use App\Models\HomeBannerModel;
use App\Models\HomeLogisticsServiceTopicsModel;
use App\Models\HomeInfinityContentModel;
use App\Models\HomeImageModel;
use App\Models\HomeMainServicesModel;
use App\Models\HomeOurClientsModel;
use App\Models\Services;
use App\Models\PricesModel;
use App\Models\PricesPortOfLoadingModel;
use App\Models\PricesPortOfDischargeModel;
use App\Models\PricesEquipmentTypeModel;
use App\Models\PricesCommodityModel;

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

    public function booking()
    {
        if(isset(Auth::guard('Member')->user()->id)){
            $Quote = PricesModel::where('status', 1)->where('created_id', Auth::guard('Member')->user()->id)->orderBy('id_quote', 'DESC')->paginate(5);
        }else{}
        $POL = PricesPortOfLoadingModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $POD = PricesPortOfDischargeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $pluck = $POL->pluck('POL_name');  
        $pluck2 = $POD->pluck('POD_name');
        $result1 = $pluck;
        $result2 = $pluck2;
        if(isset(Auth::guard('Member')->user()->id)){
            $data = array(
                'result1' => $result1,
                'result2' => $result2,
                'Quote' => $Quote,
            );
        }else{
            $data = array(
                'result1' => $result1,
                'result2' => $result2,
            );
        }
        return view('layouts/frontend/booking', $data);
    }

    public function booking_info($id_quote)
    {
        $Quote = PricesModel::find($id_quote);
        $Term = BookingTermModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $Commodity = PricesCommodityModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $data = array(
            'Term' => $Term,
            'Quote' => $Quote,
            'Commodity' => $Commodity,
        );
        return view('layouts/frontend/booking-info', $data);
    }

    public function booking_store(Request $request, $id_quote)
    {
        $price = PricesModel::find($id_quote);
        // Create
        $date = $request->ETD;
        $newDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        BookingModel::create([
            'id_booking' => $request->id_booking,
            'ref_id_quote' => $price->id_quote,
            'shipment_code' => 'Q' . date('Yds'),
            'company_name' => $request->company_name,
            'customer_name' => $request->customer_name,
            'booking_party' => $request->booking_party,
            'actual_shipper' => $request->actual_shipper,
            'POL' => $request->POL,
            'POD' => $request->POD,
            'ETD' => $newDate,
            'ETA' => $price->VDT,
            'commodity' => $request->commodity,
            'other' => $request->other,
            'rate' => $price->rate,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'term' => $request->term,
            'container_type' => $request->container_type,
            'gross_weight' => $request->gross_weight,
            'ocean_freight' => $request->ocean_freight,
            'status' => 1,
            'created_id' => Auth::guard('Member')->user()->id,
            'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->to('/booking-info/'.$price->id_quote)->with('success', 'Save Data Success');
    }

    public function bulkLogistics()
    {
        return view('layouts/frontend/bulkLogistics');
    }

    public function contact()
    {
        $contact = Contact::find(1);
        $contact_sale = ContactSales::where('status', 1)->orderBy('id', 'DESC')->get();
        $data = array(
            'contact' => $contact,
            'contact_sale' => $contact_sale,
        );
        return view('layouts/frontend/contact', $data);
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
        $POL = PricesPortOfLoadingModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $POD = PricesPortOfDischargeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $pluck = $POL->pluck('POL_name');  
        $pluck2 = $POD->pluck('POD_name');
        $result1 = $pluck;
        $result2 = $pluck2;
        $EquipmentType = PricesEquipmentTypeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $Commodity = PricesCommodityModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $data = array(
            'result1' => $result1,
            'result2' => $result2,
            'EquipmentType' => $EquipmentType,
            'Commodity' => $Commodity,
        );
        return view('layouts/frontend/price', $data);
    }

    public function price_get(Request $request)
    {
        // Create
        $date = $request->VDF;
        $newDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        PricesModel::create([
            'id_quote' => $request->id_quote,
            'POL' => $request->POL,
            'VDF' => $newDate,
            'POD' => $request->POD,
            'equipment_type' => $request->equipment_type,
            'weight' => $request->weight,
            'productQty' => $request->productQty,
            'commodity' => $request->commodity,
            'other' => $request->other,
            'status' => 0,
            'created_id' => Auth::guard('Member')->user()->id,
            'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->to('/price-result/search?POL='.$request->POL.'&VDF='.$request->VDF.'&POD='.$request->POD.'&equipment_type='.$request->equipment_type.'&weight='.$request->weight.'&productQty='.$request->productQty)->with('success', 'Save Data Success');
    }
    public function price_result(Request $request)
    {   
        // Result
        $POL_form = $request->POL;
        $POD_form = $request->POD;
        $productQty_form = $request->productQty;
        $equipmenttype_form = $request->equipment_type;
        $weight_form = $request->weight;
        $VDF_form = $request->VDF;
        if($POL_form != '' || $POD_form != '' || $productQty_form != '' || $equipmenttype_form != '' || $weight_form != '' || $VDF_form != ''){
            $POL = $POL_form;
            $POD = $POD_form;
            $productQty = $productQty_form;
            $equipment_type = $equipmenttype_form;
            $weight = $weight_form;
            $VDF = $VDF_form;
            $VDF_split = explode('/', $VDF);
            $VDF_result = $VDF_split[2].'-'.$VDF_split[1].'-'.$VDF_split[0];
	 	}else{
            $POL = NULL;
            $POD = NULL;
            $productQty = NULL;
            $equipment_type = NULL;
            $weight = NULL;
            $VDF_result = NULL;
		}
        $data = array(
            'POL' => $POL,
            'POD' => $POD,
            'productQty' => $productQty,
            'equipment_type' => $equipment_type,
            'weight' => $weight,
            'VDF_result' => $VDF_result,
        );
        return view('layouts/frontend/price-result', $data);
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
