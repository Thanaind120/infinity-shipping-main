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
use App\Models\AboutModel;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = AboutModel::orderBy('id', 'DESC')->get();
        $data = array(
            'about' => $about,
        );
        return view('layouts/backend/about/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/backend/about/form');
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
            $img_about = $request->file('img_about');
            if ($img_about != '') {
                    $image_gen = 'img_' . date('YmdHis') . '.' . $img_about->getClientOriginalExtension();
                    $img_about->move(public_path() . '/backend/assets/img/about', $image_gen);
                    AboutModel::create([
                        'id' => $request->id,
                        'img_about' => $image_gen,
                        'company_name' => $request->company_name,
                        'description' => $request->description,
                        'status' => 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
            } else {
                AboutModel::create([
                    'id' => $request->id,
                    'company_name' => $request->company_name,
                    'description' => $request->description,
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            return redirect()->to('/backend/about')->with('success', 'Save Data Success');
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
        $about = AboutModel::find($id);
        $data = array(
            'about' => $about,
        );
        return view('layouts/backend/about/form', $data);
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
            $img_about = $request->file('img_about');
            if ($img_about != '') {
                $image_gen = 'img_' . date('YmdHis') . '.' . $img_about->getClientOriginalExtension();
                $img_about->move(public_path() . '/backend/assets/img/about', $image_gen);
                $image1 = AboutModel::where('id', $id)->first()->img_about;
                $path_img = public_path('backend/assets/img/about/' . $image1);
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
                AboutModel::find($id)->update([
                    'img_about' => $image_gen,
                    'company_name' => $request->company_name,
                    'description' => $request->description,
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
            } else {
                if (isset($request->status)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                AboutModel::find($id)->update([
                    'company_name' => $request->company_name,
                    'description' => $request->description,
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
            }
            return redirect()->to('/backend/about')->with('success', 'Save Data Success');
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
        $image1 = AboutModel::where('id', $id)->first()->img_about;
        if ($image1 != '') {
            $path_img = public_path('backend/assets/img/about/' . $image1);
            if (file_exists($path_img) != '') {
                unlink($path_img);
            }
            AboutModel::find($id)->delete();
        } else {
            AboutModel::find($id)->delete();
        }
    }
}
