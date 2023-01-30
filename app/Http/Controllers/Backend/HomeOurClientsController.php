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
use App\Models\HomeOurClientsModel;

class HomeOurClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = HomeOurClientsModel::orderBy('id', 'DESC')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        $data = array(
            'logo' => $logo,
            'check' => $check,
        );
        return view('layouts/backend/our-clients/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/backend/our-clients/form');
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
            $img_logo = $request->file('img_logo');
            if ($img_logo != '') {
                if (count($img_logo) >= 0 && count($img_logo) <= 1) {
                    $image_gen = 'logo_' . date('YmdHis') . '.' . $img_logo[0]->getClientOriginalExtension();
                    $img_logo[0]->move(public_path() . '/backend/assets/img/logo', $image_gen);
                    HomeOurClientsModel::create([
                        'id' => $request->id,
                        'img_logo' => $image_gen,
                        'status' => 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                } elseif (count($img_logo) >= 2) {
                    foreach ($request->img_logo as $key => $qq) {
                        $aa = $request->img_logo[$key];
                        $gal = new HomeOurClientsModel();
                        $file_name = 'logo_' . date('YmdHis') . $_FILES['img_logo']['name'][$key];
                        $picture = $file_name;
                        $aa->move(public_path() . '/backend/assets/img/logo/', $picture);
                        $gal->id = $request->id;
                        $gal->img_logo = $picture;
                        $gal->status = 1;
                        $gal->created_at = Carbon::now();
                        $gal->updated_at = Carbon::now();
                        $gal->save();
                    }
                }
            } else {
                HomeOurClientsModel::create([
                    'id' => $request->id,
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            return redirect()->to('/backend/home/our-clients')->with('success', 'Save Data Success');
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
        $logo = HomeOurClientsModel::find($id);
        $data = array(
            'logo' => $logo,
        );
        return view('layouts/backend/our-clients/form', $data);
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
            $img_logo = $request->file('img_logo');
            if ($img_logo != '') {
                $image_gen = 'logo_' . date('YmdHis') . '.' . $img_logo->getClientOriginalExtension();
                $img_logo->move(public_path() . '/backend/assets/img/logo', $image_gen);
                $image1 = HomeOurClientsModel::where('id', $id)->first()->img_logo;
                $path_img = public_path('backend/assets/img/logo/' . $image1);
                if ($image1 != '') {
                    if (file_exists($path_img) != '') {
                        unlink($path_img);
                    }
                }
                if (isset($request->status)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                HomeOurClientsModel::find($id)->update([
                    'img_logo' => $image_gen,
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
            } else {
                if (isset($request->status)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                HomeOurClientsModel::find($id)->update([
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
            }
            return redirect()->to('/backend/home/our-clients')->with('success', 'Save Data Success');
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
        $image1 = HomeOurClientsModel::where('id', $id)->first()->img_logo;
        if ($image1 != '') {
            $path_img = public_path('backend/assets/img/logo/' . $image1);
            if (file_exists($path_img) != '') {
                unlink($path_img);
            }
            HomeOurClientsModel::find($id)->delete();
        } else {
            HomeOurClientsModel::find($id)->delete();
        }
    }
}
