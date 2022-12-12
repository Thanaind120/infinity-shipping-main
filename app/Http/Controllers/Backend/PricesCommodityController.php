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
use App\Models\PricesCommodityModel;

class PricesCommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Commodity = PricesCommodityModel::orderBy('id', 'DESC')->get();
        $data = array(
            'Commodity' => $Commodity,
        );
        return view('layouts/backend/commodity/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/backend/commodity/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save
        if ($request->type == 1) {
            PricesCommodityModel::create([
                'id' => $request->id,
                'commodity_name' => $request->commodity_name,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/price/commodity')->with('success', 'Save Data Success');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Commodity = PricesCommodityModel::find($id);
        $data = array(
            'Commodity' => $Commodity,
        );
        return view('layouts/backend/commodity/form', $data);
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
         //update
         if ($request->type == 2) {
            if (isset($request->status)) {
                $status = 1;
            } else {
                $status = 0;
            }
            PricesCommodityModel::find($id)->update([
                'commodity_name' => $request->commodity_name,
                'status' => $status,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/price/commodity')->with('success', 'Save Data Success');
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
        PricesCommodityModel::find($id)->delete();
    }
}
