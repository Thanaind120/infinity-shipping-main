<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactSales;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find(1);
        $contactsales = ContactSales::all();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        // dd($services);
        return view("layouts/backend/contact/form", [
            'contact' =>  $contact,
            'contactsales' =>  $contactsales,
            'check' =>  $check,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        // dd($request->sales_old_delete);

        if ($request->type == 2) {
            //  try  catch เอาไว้เช็คเวลา บันทึกเข้า database ไม่ผ่าน
            try {
                DB::beginTransaction();
                $contact = Contact::find($request->id);
                $contact->contact_description = $request->contact_description;
                $contact->contact_address = $request->contact_address;
                $contact->contact_phone = $request->contact_phone;
                $contact->contact_fax = $request->contact_fax;
                $contact->contact_email = $request->contact_email;
                $contact->contact_line = $request->contact_line;
                $contact->link_map = $request->link_map;

                if ($request->status != null) {
                    $contact->status = 1;
                } else {
                    $contact->status = 0;
                }

                $contact->updated_at = Carbon::now();
                // dd($service);
                // $service->save();
                if ($contact->save()) {

                    // update ข้อมูล sales
                    if ($request->contact_sales_id != null) {
                        foreach ($request->contact_sales_id as $key => $value) {
                            $ContactSales = ContactSales::find($request->contact_sales_id[$key]);
                            $ContactSales->contact_id = 1;
                            $ContactSales->sales_name = $request->sales_name_old[$key];
                            $ContactSales->tel = $request->tel_old[$key];
                            $ContactSales->updated_at = Carbon::now();
                            $ContactSales->save();
                        }
                    }
                    // insert ข้อมูล sales
                    if ($request->sales_name != null) {
                        foreach ($request->sales_name as $key => $value) {
                            $ContactSales = new ContactSales();
                            $ContactSales->contact_id = 1;
                            $ContactSales->sales_name = $request->sales_name[$key];
                            $ContactSales->tel = $request->tel[$key];
                            $ContactSales->updated_at = Carbon::now();
                            $ContactSales->save();
                        }
                    }

                    // delete ข้อมูล sales
                    if ($request->sales_old_delete != null) {

                        // แยกจาก 1,2 แปลงมาเป็น array
                        $sales_old_delete = explode(',', $request->sales_old_delete);

                        foreach ($sales_old_delete as $key => $value) {
                            $ContactSales = ContactSales::find($sales_old_delete[$key])->delete();
                        }
                    }
                    DB::commit();
                    return redirect()->to('/backend/contact/edit/1')->with('success', 'Save Data Success');
                } else {
                    return redirect()->to('/backend/contact/edit/1')->with('error', 'Save Data error');
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
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
