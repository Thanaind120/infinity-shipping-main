<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\HomeBannerModel;

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = HomeBannerModel::orderBy('id', 'DESC')->get();
        $data = array(
            'banner' => $banner,
        );
        return view('layouts/backend/banner/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/backend/banner/form');
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
            $img_banner = $request->file('img_banner');
            if ($img_banner != '') {
                if (count($img_banner) >= 0 && count($img_banner) <= 1) {
                    $image_gen = 'banner_' . date('YmdHis') . '.' . $img_banner[0]->getClientOriginalExtension();
                    $img_banner[0]->move(public_path() . '/backend/assets/img/banner', $image_gen);
                    HomeBannerModel::create([
                        'id' => $request->id,
                        'img_banner' => $image_gen,
                        'status' => 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                } elseif (count($img_banner) >= 2) {
                    foreach ($request->img_banner as $key => $qq) {
                        $aa = $request->img_banner[$key];
                        $gal = new HomeBannerModel();
                        $file_name = 'banner_' . date('YmdHis') . $_FILES['img_banner']['name'][$key];
                        $picture = $file_name;
                        $aa->move(public_path() . '/backend/assets/img/banner/', $picture);
                        $gal->id = $request->id;
                        $gal->img_banner = $picture;
                        $gal->status = 1;
                        $gal->created_at = Carbon::now();
                        $gal->updated_at = Carbon::now();
                        $gal->save();
                    }
                }
            } else {
                HomeBannerModel::create([
                    'id' => $request->id,
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            return redirect()->to('/backend/home/banner')->with('success', 'Save Data Success');
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
        $banner = HomeBannerModel::find($id);
        $data = array(
            'banner' => $banner,
        );
        return view('layouts/backend/banner/form', $data);
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
            $img_banner = $request->file('img_banner');
            if ($img_banner != '') {
                $image_gen = 'banner_' . date('YmdHis') . '.' . $img_banner->getClientOriginalExtension();
                $img_banner->move(public_path() . '/backend/assets/img/banner', $image_gen);
                $image1 = HomeBannerModel::where('id', $id)->first()->img_banner;
                $path_img = public_path('backend/assets/img/banner/' . $image1);
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
                HomeBannerModel::find($id)->update([
                    'img_banner' => $image_gen,
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
            } else {
                if (isset($request->status)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                HomeBannerModel::find($id)->update([
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
            }
            return redirect()->to('/backend/home/banner')->with('success', 'Save Data Success');
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
        $image1 = HomeBannerModel::where('id', $id)->first()->img_banner;
        if ($image1 != '') {
            $path_img = public_path('backend/assets/img/banner/' . $image1);
            if (file_exists($path_img) != '') {
                unlink($path_img);
            }
            HomeBannerModel::find($id)->delete();
        } else {
            HomeBannerModel::find($id)->delete();
        }
    }
}
