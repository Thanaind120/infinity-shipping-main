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
use App\Models\HomeImageModel;

class HomeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = HomeImageModel::orderBy('id', 'DESC')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        $data = array(
            'image' => $image,
            'check' => $check,
        );
        return view('layouts/backend/image/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/backend/image/form');
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
            $img_image = $request->file('img_image');
            if ($img_image != '') {
                if (count($img_image) >= 0 && count($img_image) <= 1) {
                    $image_gen = 'img_' . date('YmdHis') . '.' . $img_image[0]->getClientOriginalExtension();
                    $img_image[0]->move(public_path() . '/backend/assets/img/image', $image_gen);
                    HomeImageModel::create([
                        'id' => $request->id,
                        'img_image' => $image_gen,
                        'status' => 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                } elseif (count($img_image) >= 2) {
                    foreach ($request->img_image as $key => $qq) {
                        $aa = $request->img_image[$key];
                        $gal = new HomeImageModel();
                        $file_name = 'img_' . date('YmdHis') . $_FILES['img_image']['name'][$key];
                        $picture = $file_name;
                        $aa->move(public_path() . '/backend/assets/img/image/', $picture);
                        $gal->id = $request->id;
                        $gal->img_image = $picture;
                        $gal->status = 1;
                        $gal->created_at = Carbon::now();
                        $gal->updated_at = Carbon::now();
                        $gal->save();
                    }
                }
            } else {
                HomeImageModel::create([
                    'id' => $request->id,
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            return redirect()->to('/backend/home/image')->with('success', 'Save Data Success');
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
        $image = HomeImageModel::find($id);
        $data = array(
            'image' => $image,
        );
        return view('layouts/backend/image/form', $data);
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
            $img_image = $request->file('img_image');
            if ($img_image != '') {
                $image_gen = 'img_' . date('YmdHis') . '.' . $img_image->getClientOriginalExtension();
                $img_image->move(public_path() . '/backend/assets/img/image', $image_gen);
                $image1 = HomeImageModel::where('id', $id)->first()->img_image;
                $path_img = public_path('backend/assets/img/image/' . $image1);
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
                HomeImageModel::find($id)->update([
                    'img_image' => $image_gen,
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
            } else {
                if (isset($request->status)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                HomeImageModel::find($id)->update([
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
            }
            return redirect()->to('/backend/home/image')->with('success', 'Save Data Success');
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
        $image1 = HomeImageModel::where('id', $id)->first()->img_image;
        if ($image1 != '') {
            $path_img = public_path('backend/assets/img/image/' . $image1);
            if (file_exists($path_img) != '') {
                unlink($path_img);
            }
            HomeImageModel::find($id)->delete();
        } else {
            HomeImageModel::find($id)->delete();
        }
    }
}
