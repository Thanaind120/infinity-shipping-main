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

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Book = BookingModel::orderBy(DB::raw('case when status = 6 then 1 when status = 1 then 2 when status = 2 then 3 when status = 3 then 4 when status = 4 then 5 when status = 5 then 6 when status = 0 then 7 end'))->orderBy('id_booking', 'DESC')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        $data = array(
            'Book' => $Book,
            'check' => $check,
        );
        return view('layouts/backend/booking/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = array(
            'Book' => $Book,
        );
        return view('layouts/backend/booking/form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Book = BookingModel::find($id);
        $data = array(
            'Book' => $Book,
        );
        return view('layouts/backend/booking/form2', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        BookingModel::find($id)->update([
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->to('/backend/booking')->with('success', 'Save Data Success');
    }

    public function updates(Request $request, $id)
    {
        BookingModel::find($id)->update([
            'deadlines' => $request->deadlines,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->to('/backend/booking')->with('success', 'Save Data Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
