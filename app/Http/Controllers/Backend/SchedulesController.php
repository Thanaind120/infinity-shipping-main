<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\BookingModel;
use App\Models\SchedulesModel;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Book = BookingModel::orderBy(DB::raw('case when status = 1 then 1 when status = 2 then 2 when status = 3 then 3 when status = 4 then 4 when status = 5 then 5 when status = 6 then 6 when status = 0 then 7 end'))->orderBy('id_booking', 'DESC')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        $data = array(
            'Book' => $Book,
            'check' => $check,
        );
        return view('layouts/backend/schedules/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $Book = BookingModel::find($id);
        $data = array(
            'Book' => $Book,
        );
        return view('layouts/backend/schedules/form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // save
        if ($request->type == 1) {
            $Book = BookingModel::find($id);
            $length = 5;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomStrings = '';
            for ($i = 0; $i < $length; $i++) {
                $randomStrings .= $characters[rand(0, $charactersLength - 1)];
            }
            $p = SchedulesModel::where('transport_code',$randomStrings)->first();
            if($p != null){
                $length = 5;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                $date = $request->save_datetime;
                $newDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                SchedulesModel::create([
                    'id_schedules' => $request->id_schedules,
                    'transport_code' => 'S'.date('Y').$randomString,
                    'ref_id_booking' => $Book->id_booking,
                    'ref_shipment_code' => $Book->shipment_code,
                    'city_name' => $request->city_name,
                    'location' => $request->location,
                    'transport_status' => $request->transport_status,
                    'ship_code' => $request->ship_code,
                    'save_datetime' => $newDate,
                    'status' => 1,
                    'created_id' => Auth::guard('web')->user()->id,
                    'created_by' => Auth::guard('web')->user()->name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                if($request->ship_code != ''){
                    if($request->transport_status == 'ESTIMATE ARRIVAL'){
                        BookingModel::find($Book->id_booking)->update([
                            'EVV' => $request->ship_code,
                            'place_of_arrival' => $request->location,
                            'ref_transport_status' => $request->transport_status,
                            'arrival' => $newDate,
                            'updated_at' => Carbon::now()
                        ]);
                    }else if($request->transport_status == 'GATE OUT'){
                        BookingModel::find($Book->id_booking)->update([
                            'EVV' => $request->ship_code,
                            'place_of_departure' => $request->location,
                            'departure' => $newDate,
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        BookingModel::find($Book->id_booking)->update([
                            'EVV' => $request->ship_code,
                            'updated_at' => Carbon::now()
                        ]);
                    }
                }else{
                    if($request->transport_status == 'ESTIMATE ARRIVAL'){
                        BookingModel::find($Book->id_booking)->update([
                            'place_of_arrival' => $request->location,
                            'ref_transport_status' => $request->transport_status,
                            'arrival' => $newDate,
                            'updated_at' => Carbon::now()
                        ]);
                    }else if($request->transport_status == 'GATE OUT'){
                        BookingModel::find($Book->id_booking)->update([
                            'place_of_departure' => $request->location,
                            'departure' => $newDate,
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        BookingModel::find($Book->id_booking)->update([
                            'updated_at' => Carbon::now()
                        ]);
                    }
                }
            }else{
                $date = $request->save_datetime;
                $newDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                SchedulesModel::create([
                    'id_schedules' => $request->id_schedules,
                    'transport_code' => 'S'.date('Y').$randomStrings,
                    'ref_id_booking' => $Book->id_booking,
                    'ref_shipment_code' => $Book->shipment_code,
                    'city_name' => $request->city_name,
                    'location' => $request->location,
                    'transport_status' => $request->transport_status,
                    'ship_code' => $request->ship_code,
                    'save_datetime' => $newDate,
                    'status' => 1,
                    'created_id' => Auth::guard('web')->user()->id,
                    'created_by' => Auth::guard('web')->user()->name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                if($request->ship_code != ''){
                    if($request->transport_status == 'ESTIMATE ARRIVAL'){
                        BookingModel::find($Book->id_booking)->update([
                            'EVV' => $request->ship_code,
                            'place_of_arrival' => $request->location,
                            'ref_transport_status' => $request->transport_status,
                            'arrival' => $newDate,
                            'updated_at' => Carbon::now()
                        ]);
                    }else if($request->transport_status == 'GATE OUT'){
                        BookingModel::find($Book->id_booking)->update([
                            'EVV' => $request->ship_code,
                            'place_of_departure' => $request->location,
                            'departure' => $newDate,
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        BookingModel::find($Book->id_booking)->update([
                            'EVV' => $request->ship_code,
                            'updated_at' => Carbon::now()
                        ]);
                    }
                }else{
                    if($request->transport_status == 'ESTIMATE ARRIVAL'){
                        BookingModel::find($Book->id_booking)->update([
                            'place_of_arrival' => $request->location,
                            'ref_transport_status' => $request->transport_status,
                            'arrival' => $newDate,
                            'updated_at' => Carbon::now()
                        ]);
                    }else if($request->transport_status == 'GATE OUT'){
                        BookingModel::find($Book->id_booking)->update([
                            'place_of_departure' => $request->location,
                            'departure' => $newDate,
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        BookingModel::find($Book->id_booking)->update([
                            'updated_at' => Carbon::now()
                        ]);
                    }
                }
            }
            return redirect()->to('/backend/schedules/add-detail/'.$Book->id_booking)->with('success', 'Save Data Success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Book = BookingModel::find($id);
        $Schedules = SchedulesModel::where('ref_id_booking', $id)->orderBy('id_schedules', 'ASC')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        $data = array(
            'Book' => $Book,
            'Schedules' => $Schedules,
            'check' => $check,
        );
        return view('layouts/backend/schedules/index2', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_booking, $id)
    {
        $Book = BookingModel::find($id_booking);
        $Schedules = SchedulesModel::find($id);
        $data = array(
            'Book' => $Book,
            'Schedules' => $Schedules,
        );
        return view('layouts/backend/schedules/form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_booking, $id)
    {
        //update
        if ($request->type == 2) {
            $Book = BookingModel::find($id_booking);
            if (isset($request->status)) {
                $status = 1;
            } else {
                $status = 0;
            }
            $date = $request->save_datetime;
            $newDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
            SchedulesModel::find($id)->update([
                'city_name' => $request->city_name,
                'location' => $request->location,
                'transport_status' => $request->transport_status,
                'ship_code' => $request->ship_code,
                'save_datetime' => $newDate,
                'status' => $status,
                'updated_at' => Carbon::now()
            ]);
            if($request->ship_code != ''){
                if($request->transport_status == 'ESTIMATE ARRIVAL'){
                    BookingModel::find($Book->id_booking)->update([
                        'EVV' => $request->ship_code,
                        'place_of_arrival' => $request->location,
                        'ref_transport_status' => $request->transport_status,
                        'arrival' => $newDate,
                        'updated_at' => Carbon::now()
                    ]);
                }else if($request->transport_status == 'GATE OUT'){
                    BookingModel::find($Book->id_booking)->update([
                        'EVV' => $request->ship_code,
                        'place_of_departure' => $request->location,
                        'departure' => $newDate,
                        'updated_at' => Carbon::now()
                    ]);
                }else{
                    BookingModel::find($Book->id_booking)->update([
                        'EVV' => $request->ship_code,
                        'updated_at' => Carbon::now()
                    ]);
                }
            }else{
                if($request->transport_status == 'ESTIMATE ARRIVAL'){
                    BookingModel::find($Book->id_booking)->update([
                        'place_of_arrival' => $request->location,
                        'ref_transport_status' => $request->transport_status,
                        'arrival' => $newDate,
                        'updated_at' => Carbon::now()
                    ]);
                }else if($request->transport_status == 'GATE OUT'){
                    BookingModel::find($Book->id_booking)->update([
                        'place_of_departure' => $request->location,
                        'departure' => $newDate,
                        'updated_at' => Carbon::now()
                    ]);
                }else{
                    BookingModel::find($Book->id_booking)->update([
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
            return redirect()->to('/backend/schedules/add-detail/'.$Book->id_booking)->with('success', 'Save Data Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SchedulesModel::find($id)->delete();
    }
}