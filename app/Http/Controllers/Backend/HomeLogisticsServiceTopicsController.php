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
use App\Models\HomeLogisticsServiceTopicsModel;

class HomeLogisticsServiceTopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logistics_service_topics = HomeLogisticsServiceTopicsModel::orderBy('id', 'DESC')->get();
        $data = array(
            'logistics_service_topics' => $logistics_service_topics,
        );
        return view('layouts/backend/logistics-service/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/backend/logistics-service/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->type == 1) {
            HomeLogisticsServiceTopicsModel::create([
                'id' => $request->id,
                'topic' => $request->topic,
                'content' => $request->content,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
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
        $logistics_service_topics = HomeLogisticsServiceTopicsModel::find($id);
        $data = array(
            'logistics_service_topics' => $logistics_service_topics,
        );
        return view('layouts/backend/logistics-service/form', $data);
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
        if ($request->type == 2) {
            HomeLogisticsServiceTopicsModel::find($id)->update([
                'topic' => $request->topic,
                'content' => $request->content,
                'updated_at' => Carbon::now()
            ]);
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
        HomeLogisticsServiceTopicsModel::find($id)->delete();
    }
}
