<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class MemberController extends Controller
{

    public function in_progress(Request $request)
    {

        $username = $request->email;
        $password = $request->password;
        // dd($username, $password);
        if (Auth::guard('Member')->attempt(['email' => $username, 'password' => $password])) {

            $data = Member::find(Auth::guard('Member')->id());
            if ($data->status != "1") {
                Auth::guard('Member')->logout();
                return redirect()->to('/login')->with('error', 'User Email has been disabled.');
            }
            // dd('เท่า');
            return redirect()->to('/')->with('success', 'Login Success');
        } else {
            return redirect()->to('/login')->with('error', 'Email or Password is incorrect');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('Member')->logout();
        $request->session()->invalidate();
        return redirect("/login");
    }

    public function index()
    {
        //
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

        // Validator เช็คคำ
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required',
                'checkbox' => 'required',
                'g-recaptcha-response' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'email' => 'required|email|unique:members',
                'confirm_password' => 'required|same:password',
            ],
            [

                // 'first_name.required' => 'กรุณากรอกรหัสผ่าน.',
                // 'last_name.required' => 'กรุณากรอกรหัสผ่าน.',
                // 'phone_number.required' => 'กรุณากรอกรหัสผ่าน.',
                // 'email.required' => 'กรุณากรอกอีเมล.',
                // 'password.required' => 'กรุณากรอกรหัสผ่าน.',
                // 'confirm_password.required' => 'กรุณากรอกยืนยันรหัสผ่าน.',
                // 'confirm_password.required_with' => 'กรุณาใส่รหัสผ่านเดียวกันกับรหัสผ่านแรก.',
                // 'confirm_password.same' => 'รหัสผ่านไม่ตรงกัน.',
            ]
        );
        if (!$validator->passes()) {

            return response()->json(['status' => 0, 'oldpass' => 3, 'error' => $validator->errors()->toArray()]);
        } else {
            // dd($request->all());

            try {
                DB::beginTransaction();
                $member = new Member();
                $member->email = $request->email;
                $member->password = bcrypt($request->password);
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

                $member->status = 2;
                $member->created_at = Carbon::now();
                $member->updated_at = Carbon::now();
                $member->last_login = Carbon::now();

                if ($member->save()) {
                    DB::commit();
                    // return redirect()->to('/login')->with('success', 'Save Data Success');
                    response()->json(['status' => 1]);
                } else {
                    return redirect()->to('/register')->with('error', 'Save Data error');
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
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
