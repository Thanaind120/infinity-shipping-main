<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeBannerModel;

use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('test');
        $services = Services::orderBy('id', 'DESC')->get();
        return view("layouts/backend/services/index", [
            'services' =>  $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("layouts/backend/services/form", []);
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
            $service_images1 = $request->file('service_images1');
            $service_images2 = $request->file('service_images2');

            //  try  catch เอาไว้เช็คเวลา บันทึกเข้า database ไม่ผ่าน
            try {
                DB::beginTransaction();
                $service = new Services();
                $service->service_name = $request->service_name;

                // generate name file และ move file
                if ($service_images1 != null) {
                    $image_gen1 = 'services1_' . date('YmdHis') . '.' . $service_images1->getClientOriginalExtension();
                    $service_images1->move(public_path() . '/backend/assets/img/services', $image_gen1);
                    $service->service_images1 = $image_gen1;
                }
                if ($service_images2 != null) {
                    $image_gen2 = 'services2_' . date('YmdHis') . '.' . $service_images2->getClientOriginalExtension();
                    $service_images2->move(public_path() . '/backend/assets/img/services', $image_gen2);
                    $service->service_images2 = $image_gen2;
                }
                $service->service_description = $request->service_description;
                $service->status = 1;
                $service->created_at = Carbon::now();
                $service->updated_at = Carbon::now();
                // dd($service);
                // $service->save();
                if ($service->save()) {
                    DB::commit();
                    return redirect()->to('/backend/services')->with('success', 'Save Data Success');
                } else {
                    return redirect()->to('/backend/services')->with('error', 'Save Data error');
                }
            } catch (\Exception $e) {
                $error_log = $e->getMessage();
                dd($error_log);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $services = Services::find($id);
        return view("layouts/backend/services/form", [
            'services' =>  $services,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services)
    {

        if ($request->type == 2) {
            $service_images1 = $request->file('service_images1');
            $service_images2 = $request->file('service_images2');

            //  try  catch เอาไว้เช็คเวลา บันทึกเข้า database ไม่ผ่าน
            try {
                DB::beginTransaction();
                $service = Services::find($request->id);
                $service->service_name = $request->service_name;

                // generate name file และ move file
                if ($service_images1 != null) {
                    $image_gen1 = 'services1_' . date('YmdHis') . '.' . $service_images1->getClientOriginalExtension();
                    $service_images1->move(public_path() . '/backend/assets/img/services', $image_gen1);
                    // ลบไฟล์ภาพ
                    $path_img1 = public_path('backend/assets/img/services/' . $service->service_images1);
                    if (file_exists($path_img1) != '') {
                        unlink($path_img1);
                    }
                    $service->service_images1 = $image_gen1;
                }
                if ($service_images2 != null) {
                    $image_gen2 = 'services2_' . date('YmdHis') . '.' . $service_images2->getClientOriginalExtension();
                    $service_images2->move(public_path() . '/backend/assets/img/services', $image_gen2);

                    // ลบไฟล์ภาพ
                    $path_img2 = public_path('backend/assets/img/services/' . $service->service_images2);
                    if (file_exists($path_img2) != '') {
                        unlink($path_img2);
                    }
                    $service->service_images2 = $image_gen2;
                }


                $service->service_description = $request->service_description;
                if ($request->status != null) {
                    $service->status = 1;
                } else {
                    $service->status = 0;
                }
                $service->created_at = Carbon::now();
                $service->updated_at = Carbon::now();
                // dd($service);
                // $service->save();
                if ($service->save()) {
                    DB::commit();
                    return redirect()->to('/backend/services')->with('success', 'Save Data Success');
                } else {
                    return redirect()->to('/backend/services')->with('error', 'Save Data error');
                }
            } catch (\Exception $e) {
                $error_log = $e->getMessage();
                dd($error_log);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Services::find($id);
        if ($service != null) {
            if ($service->service_images1 != null) {
                $path_img1 = public_path('backend/assets/img/services/' . $service->service_images1);
                if (file_exists($path_img1) != '') {
                    unlink($path_img1);
                }
            }
            if ($service->service_images2 != null) {
                $path_img2 = public_path('backend/assets/img/services/' . $service->service_images2);
                if (file_exists($path_img2) != '') {
                    unlink($path_img2);
                }
            }
            Services::find($id)->delete();
        }
    }
}
