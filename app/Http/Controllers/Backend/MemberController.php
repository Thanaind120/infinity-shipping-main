<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('id', 'DESC')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        return view("layouts/backend/member/index", [
            'members' =>  $members,
            'check' =>  $check,
        ]);
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
    public function show(request $request, $id)
    {
        $members = Member::find($id);
        // $services = Services::find($id);
        return view("layouts/backend/member/form2", [
            'members' =>  $members,
        ]);
    }

    public function edit($id)
    {
        $members = Member::find($id);
        $services = Services::find($id);
        return view("layouts/backend/member/form", [
            'services' =>  $services,
            'members' =>  $members,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        // dd('asd');

        try {
            DB::beginTransaction();
            $member = Member::find($request->id);
            $member->email = $request->email;
            // $member->password = bcrypt($request->password);
            $member->first_name = $request->first_name;
            $member->last_name = $request->last_name;
            $member->phone_number = $request->phone_number;

            $member->company_name = $request->company_name;
            $member->company_type = $request->company_type;
            $member->company_type_other = $request->company_type_other;
            $member->address = $request->address;
            $member->address_more = $request->address_more;
            $member->city = $request->city;
            $member->zip_code = $request->zip_code;
            $member->country_region = $request->country_region;
            $member->colleague_email = $request->colleague_email;

            if ($request->status != null) {
                $member->status = 1;
            } else {
                $member->status = 0;
            }
            $member->updated_at = Carbon::now();
            $member->last_login = Carbon::now();

            if ($member->save()) {
                DB::commit();
                return redirect()->to('/backend/member/')->with('success', 'Save Data Success');
                // response()->json(['status' => 1]);
            } else {
                return redirect()->to('/backend/member/')->with('error', 'Save Data error');
            }
        } catch (\Exception $e) {
            $error_log = $e->getMessage();
            dd($error_log);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        if ($member != null) {
            Member::find($member->id)->delete();
        }
    }
}
