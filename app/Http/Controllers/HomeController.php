<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AboutModel;
use App\Models\BookingTermModel;
use App\Models\BookingNotesModel;
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
use App\Models\MemberModel;
use App\Mail\BookingMail;
use App\Mail\BookingMail2;

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
        $Book = BookingModel::orderBy('id_booking', 'DESC')->get();
        $data = array(
            'Book' => $Book,
        );
        return view('layouts/frontend/account', $data);
    }

    public function account_update(Request $request, $id)
    {
        $password = $request->new_password;
        if($request->new_password == $request->confirm_password && $request->new_password != ""){
            $varible = Hash::make($request->new_password);
            Cookie::queue('newpassword',$password,time()+(10*365*60*60));
            MemberModel::find($id)->update([
                'password' => $varible,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/account')->with('success', 'Save Data Success');
        }else{
            return redirect()->to('/account')->with('success', 'Save Data Success');
        }
    }

    public function allaccount_update(Request $request, $id)
    {
        if($request->company_type == 1){
            $companytype = 'Supplier / Explorter';
        }else if($request->company_type == 2){
            $companytype = 'Freight Forwarder';
        }else if($request->company_type == 3){
            $companytype = 'Other';
        }
        MemberModel::find($id)->update([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'company_name' => $request->company_name,
            'company_type' => $companytype,
            'company_type_other' => $request->company_type_other,
            'address' => $request->address,
            'address_more' => $request->address_more,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'country_region' => $request->country_region,
            'country_region_other' => $request->country_region_other,
            'colleague_email' => $request->colleague_email,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->to('/account')->with('success', 'Save Data Success');
    }

    public function updates(Request $request, $id)
    {
        BookingModel::find($id)->update([
            'status' => 6,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->to('/account')->with('success', 'Save Data Success');
    }

    public function booking()
    {
        if(isset(Auth::guard('Member')->user()->id)){
            $Quote = PricesModel::where('status', 1)->where('created_id', Auth::guard('Member')->user()->id)->orderBy('id_quote', 'DESC')->paginate(5);
            $Quotes = PricesModel::select(DB::raw('SUM(amount) as total_quote'))->where('status', 1)->where('created_id', Auth::guard('Member')->user()->id)->get();
        }
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
                'Quotes' => $Quotes,
            );
        }else{
            $data = array(
                'result1' => $result1,
                'result2' => $result2,
            );
        }
        return view('layouts/frontend/booking', $data);
    }

    public function booking_search(request $request)
    {
        // Result
        $POL_form = $request->POL;
	 	if($POL_form == ''){
            $POLS = NULL;
	 	}else{
            $POLS = $POL_form;
		}
	 	$POD_form = $request->POD;
	 	if($POD_form == ''){
            $PODS =  NULL;
	 	}else{
			$PODS = $POD_form;
		}
        $date_form = $request->date;
	 	if($date_form == ''){
            $date =  '01-'.date('m-Y');
	 	}else{
			$date = $date_form;
		}
        $week_form = $request->week;
	 	if($week_form == ''){
            $week =  NULL;
	 	}else if($week_form == 1){
            $week = date('Y-m-d', strtotime($date_form . ' +1 week'));
		}else if($week_form == 2){
			$week = date('Y-m-d', strtotime($date_form . ' +2 week'));
		}else if($week_form == 3){
			$week = date('Y-m-d', strtotime($date_form . ' +3 week'));
		}else if($week_form == 4){
            $week = date('Y-m-d', strtotime($date_form . ' +4 week'));
        }
        $POL = PricesPortOfLoadingModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $POD = PricesPortOfDischargeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $pluck = $POL->pluck('POL_name');  
        $pluck2 = $POD->pluck('POD_name');
        $result1 = $pluck;
        $result2 = $pluck2;
        $Quote = PricesModel::where('status', 1)->where('created_id', Auth::guard('Member')->user()->id)->where('POL', $POLS)->where('POD', $PODS)->where('VDF','>=', $date)->where('VDF','<=', $week)->orderBy('id_quote', 'DESC')->paginate(5);
        $Quotes = PricesModel::select(DB::raw('SUM(amount) as total_quote'))->where('status', 1)->where('created_id', Auth::guard('Member')->user()->id)->where('POL', $POLS)->where('POD', $PODS)->where('VDF','>=', $date)->where('VDF','<=', $week)->get();
        $data = array(
            'Quote' => $Quote,
            'Quotes' => $Quotes,
            'POLS' => $POLS,
            'PODS' => $PODS,
            'date' => $date,
            'week_form' => $week_form,
            'result1' => $result1,
            'result2' => $result2,
        );
        return view('layouts/frontend/booking', $data);
    }

    public function booking_info($quote_code)
    {
        $Quote = PricesModel::where('quote_code',$quote_code)->first();
        $remark = BookingNotesModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $Term = BookingTermModel::where('status', 1)->orderBy('id', 'DESC')->get();
        $Commodity = PricesCommodityModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $data = array(
            'remark' => $remark,
            'Term' => $Term,
            'Quote' => $Quote,
            'Commodity' => $Commodity,
        );
        return view('layouts/frontend/booking-info', $data);
    }

    public function booking_store(Request $request, $quote_code)
    {
        // Create
        $price = PricesModel::where('quote_code',$quote_code)->first();
        $date = $request->ETD;
        $newDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $dates = date('Y-m-d H:i:s');
        $day = $price->save_datetime;
        $stop_date = date('Y-m-d H:i:s', strtotime($day . ' +1 day')); 
        if($stop_date >= $dates){
            if($price->privilege == 1){
                $rate = $price->special_rate;
            }else{
                $rate = $price->rate;
            }
        }else{
            $rate = $price->rate;
        }
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomStrings = '';
        for ($i = 0; $i < $length; $i++) {
            $randomStrings .= $characters[rand(0, $charactersLength - 1)];
        }
        $p = BookingModel::where('shipment_code',$randomStrings)->first();
        if($p != null){
            $length = 5;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $data_Adminmail = [
                'company_name' => $request->company_name,
                'customer_name' => $request->customer_name,
                'booking_party' => $request->booking_party,
                'actual_shipper' => $request->actual_shipper,
                'POL' => $request->POL,
                'POD' => $request->POD,
                'ETD' => $newDate,
                'commodity' => $request->commodity,
                'other' => $request->other,
                'rate' => $rate,
                'pickup_date' => $request->pickup_date,
                'return_date' => $request->return_date,
                'term' => $request->term,
                'container_type' => $request->container_type,
                'gross_weight' => $request->gross_weight,
                'ocean_freight' => $request->ocean_freight,
                'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
            ];
            Mail::send(new BookingMail($data_Adminmail));
            $data_Membermail = [
                'email' => Auth::guard('Member')->user()->email,
                'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
            ];
            Mail::send(new BookingMail2($data_Membermail));
            BookingModel::create([
                'id_booking' => $request->id_booking,
                'shipment_code' => 'B'.date('Y').$randomString,
                'ref_id_quote' => $price->id_quote,
                'ref_quote_code' => $price->quote_code,
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
                'rate' => $rate,
                'pickup_date' => $request->pickup_date,
                'return_date' => $request->return_date,
                'term' => $request->term,
                'container_type' => $request->container_type,
                'gross_weight' => $request->gross_weight,
                'ocean_freight' => $request->ocean_freight,
                'status' => 1,
                'amount' => 1,
                'created_id' => Auth::guard('Member')->user()->id,
                'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }else{
            $data_Adminmail = [
                'company_name' => $request->company_name,
                'customer_name' => $request->customer_name,
                'booking_party' => $request->booking_party,
                'actual_shipper' => $request->actual_shipper,
                'POL' => $request->POL,
                'POD' => $request->POD,
                'ETD' => $newDate,
                'commodity' => $request->commodity,
                'other' => $request->other,
                'rate' => $rate,
                'pickup_date' => $request->pickup_date,
                'return_date' => $request->return_date,
                'term' => $request->term,
                'container_type' => $request->container_type,
                'gross_weight' => $request->gross_weight,
                'ocean_freight' => $request->ocean_freight,
                'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
            ];
            Mail::send(new BookingMail($data_Adminmail));
            $data_Membermail = [
                'email' => Auth::guard('Member')->user()->email,
                'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
            ];
            Mail::send(new BookingMail2($data_Membermail));
            BookingModel::create([
                'id_booking' => $request->id_booking,
                'shipment_code' => 'B'.date('Y').$randomStrings,
                'ref_id_quote' => $price->id_quote,
                'ref_quote_code' => $price->quote_code,
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
                'rate' => $rate,
                'pickup_date' => $request->pickup_date,
                'return_date' => $request->return_date,
                'term' => $request->term,
                'container_type' => $request->container_type,
                'gross_weight' => $request->gross_weight,
                'ocean_freight' => $request->ocean_freight,
                'status' => 1,
                'amount' => 1,
                'created_id' => Auth::guard('Member')->user()->id,
                'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->to('/booking-info/'.$price->quote_code)->with('success', 'Save Data Success');
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
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomStrings = '';
        for ($i = 0; $i < $length; $i++) {
            $randomStrings .= $characters[rand(0, $charactersLength - 1)];
        }
        $p = PricesModel::where('quote_code',$randomStrings)->first();
        if($p != null){
            $length = 5;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            PricesModel::create([
                'id_quote' => $request->id_quote,
                'quote_code' => 'Q'.date('Y').$randomString,
                'POL' => $request->POL,
                'VDF' => $newDate,
                'POD' => $request->POD,
                'equipment_type' => $request->equipment_type,
                'weight' => $request->weight,
                'productQty' => $request->productQty,
                'commodity' => $request->commodity,
                'other' => $request->other,
                'status' => 0,
                'amount' => 1,
                'created_id' => Auth::guard('Member')->user()->id,
                'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
                'save_datetime' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }else{
            PricesModel::create([
                'id_quote' => $request->id_quote,
                'quote_code' => 'Q'.date('Y').$randomStrings,
                'POL' => $request->POL,
                'VDF' => $newDate,
                'POD' => $request->POD,
                'equipment_type' => $request->equipment_type,
                'weight' => $request->weight,
                'productQty' => $request->productQty,
                'commodity' => $request->commodity,
                'other' => $request->other,
                'status' => 0,
                'amount' => 1,
                'created_id' => Auth::guard('Member')->user()->id,
                'created_by' => Auth::guard('Member')->user()->first_name.' '.Auth::guard('Member')->user()->last_name,
                'save_datetime' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->to('/price-result/search?POL='.$request->POL.'&VDF='.$request->VDF.'&POD='.$request->POD.'&equipment_type='.$request->equipment_type.'&weight='.$request->weight.'&productQty='.$request->productQty);
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
        // $Quote = PricesModel::where('status', 1)->where('created_id', Auth::guard('Member')->user()->id)->where('POL', $POL)->where('POD', $POD)->where('productQty', $productQty)->where('equipment_type', $equipment_type)->where('weight', $weight)->where('VDF', '>=', $VDF_result)->orderBy('id_quote', 'DESC')->paginate(3);
        $Quote = PricesModel::where('status', 1)->where('created_id', Auth::guard('Member')->user()->id)->where('POL', $POL)->where('POD', $POD)->where('VDF', '>=', $VDF_result)->orderBy('id_quote', 'DESC')->paginate(3);
        $data = array(
            'POL' => $POL,
            'POD' => $POD,
            'productQty' => $productQty,
            'equipment_type' => $equipment_type,
            'weight' => $weight,
            'VDF_result' => $VDF_result,
            'Quote' => $Quote,
        );
        return view('layouts/frontend/price-result', $data);
    }

    public function schedule_result()
    {
        return view('layouts/frontend/schedule-result');
    }

    public function schedule()
    {
        $POL = PricesPortOfLoadingModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $POD = PricesPortOfDischargeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $pluck = $POL->pluck('POL_name');  
        $pluck2 = $POD->pluck('POD_name');
        $result1 = $pluck;
        $result2 = $pluck2;
        $EquipmentType = PricesEquipmentTypeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $data = array(
            'result1' => $result1,
            'result2' => $result2,
            'EquipmentType' => $EquipmentType,
        );
        return view('layouts/frontend/schedule', $data);
    }

    public function schedule_search(Request $request)
    {
        $POL_form = $request->POL;
        if($POL_form == ''){
           $POLS = NULL;
        }else{
           $POLS = $POL_form;
        }
        $POD_form = $request->POD;
        if($POD_form == ''){
           $PODS =  NULL;
        }else{
           $PODS = $POD_form;
        }
        $date_form = $request->date;
        if($date_form == ''){
           $date = NULL;
        //    $date = '01-'.date('m-Y');
        }else{
           $date = $date_form;
        }
        $type_form = $request->type;
        if($type_form == ''){
           $type = NULL;
        }else{
           $type = date('Y-m-d', strtotime($date_form));
        }
        $container_form = $request->container;
        if($container_form == ''){
           $container =  NULL;
        }else{
           $container = $container_form;
        }
        $cargo_form = $request->cargo_temperature;
        if(isset($cargo_form)){
           $cargo = 1;
        }else{
           $cargo = 0;
        }
        $POL = PricesPortOfLoadingModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $POD = PricesPortOfDischargeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $pluck = $POL->pluck('POL_name');  
        $pluck2 = $POD->pluck('POD_name');
        $result1 = $pluck;
        $result2 = $pluck2;
        $EquipmentType = PricesEquipmentTypeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        if($type_form == 'departure'){
            $Book = BookingModel::where('created_id', Auth::guard('Member')->user()->id)->where('POL', $POLS)->where('POD', $PODS)->where('departure', '>=', $type)->where('container_type', $container)->orderBy('id_booking', 'DESC')->paginate(3);
        }else if($type_form == 'arrival'){
            $Book = BookingModel::where('created_id', Auth::guard('Member')->user()->id)->where('POL', $POLS)->where('POD', $PODS)->where('arrival', '>=', $type)->where('container_type', $container)->orderBy('id_booking', 'DESC')->paginate(3);
        }
        $data = array(
            'Book' => $Book,
            'POLS' => $POLS,
            'PODS' => $PODS,
            'type_form' => $type_form,
            'date' => $date,
            'container' => $container,
            'cargo' => $cargo,
            'EquipmentType' => $EquipmentType,
            'result1' => $result1,
            'result2' => $result2,
        );
        return view('layouts/frontend/schedule-result', $data);
    }

    public function schedule_print(Request $request)
    {
        $POL_form = $request->POL;
        if($POL_form == ''){
           $POLS = NULL;
        }else{
           $POLS = $POL_form;
        }
        $POD_form = $request->POD;
        if($POD_form == ''){
           $PODS =  NULL;
        }else{
           $PODS = $POD_form;
        }
        $date_form = $request->date;
        if($date_form == ''){
           $date = NULL;
        }else{
           $date = $date_form;
        }
        $type_form = $request->type;
        if($type_form == ''){
           $type = NULL;
        }else{
           $type = date('Y-m-d', strtotime($date_form));
        }
        $container_form = $request->container;
        if($container_form == ''){
           $container =  NULL;
        }else{
           $container = $container_form;
        }
        $cargo_form = $request->cargo_temperature;
        if(isset($cargo_form)){
           $cargo = 1;
        }else{
           $cargo = 0;
        }
        $POL = PricesPortOfLoadingModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $POD = PricesPortOfDischargeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        $pluck = $POL->pluck('POL_name');  
        $pluck2 = $POD->pluck('POD_name');
        $result1 = $pluck;
        $result2 = $pluck2;
        $EquipmentType = PricesEquipmentTypeModel::where('status', 1)->orderBy('id', 'ASC')->get();
        if($type_form == 'departure'){
            $Book = BookingModel::where('created_id', Auth::guard('Member')->user()->id)->where('POL', $POLS)->where('POD', $PODS)->where('departure', '>=', $type)->where('container_type', $container)->orderBy('id_booking', 'DESC')->paginate(3);
        }else if($type_form == 'arrival'){
            $Book = BookingModel::where('created_id', Auth::guard('Member')->user()->id)->where('POL', $POLS)->where('POD', $PODS)->where('arrival', '>=', $type)->where('container_type', $container)->orderBy('id_booking', 'DESC')->paginate(3);
        }
        $data = array(
            'Book' => $Book,
            'POLS' => $POLS,
            'PODS' => $PODS,
            'type_form' => $type_form,
            'date' => $date,
            'container' => $container,
            'cargo' => $cargo,
            'EquipmentType' => $EquipmentType,
            'result1' => $result1,
            'result2' => $result2,
        );
        return view('layouts/frontend/schedule-print', $data);
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
