<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\MemberModel;
use App\Mail\MemberMail;

class MemberController extends Controller
{

    public function in_progress(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->has('remember') ? true : false;
        if (Auth::guard('Member')->attempt(['email' => $email, 'password' => $password], $remember)) {

            $data = Member::find(Auth::guard('Member')->id());
            if ($data->status != "1") {
                Auth::guard('Member')->logout();
                return redirect()->to('/login')->with('error', 'User Email has been disabled.');
            }
            if ($remember) {
                Cookie::queue('email',$email,time()+(10*365*60*60));
                Cookie::queue('password',$password,time()+(10*365*60*60));
            }else{
                Cookie::queue('email',NULL);
                Cookie::queue('password',NULL);
            }
            return redirect()->to('/')->with('login', 'Log In Success');
            
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
        // [
            // 'first_name.required' => 'กรุณากรอกรหัสผ่าน.',
            // 'last_name.required' => 'กรุณากรอกรหัสผ่าน.',
            // 'phone_number.required' => 'กรุณากรอกรหัสผ่าน.',
            // 'email.required' => 'กรุณากรอกอีเมล.',
            // 'password.required' => 'กรุณากรอกรหัสผ่าน.',
            // 'confirm_password.required' => 'กรุณากรอกยืนยันรหัสผ่าน.',
            // 'confirm_password.required_with' => 'กรุณาใส่รหัสผ่านเดียวกันกับรหัสผ่านแรก.',
            // 'confirm_password.same' => 'รหัสผ่านไม่ตรงกัน.',
        // ]
        );
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'oldpass' => 3, 'error' => $validator->errors()->toArray()]);
        } else {
            // dd($request->all());
            try {
                if($request->company_type == 1){
                    $companytype = 'Supplier / Explorter';
                }else if($request->company_type == 2){
                    $companytype = 'Freight Forwarder';
                }else if($request->company_type == 3){
                    $companytype = 'Other';
                }
                DB::beginTransaction();
                $member = new Member();
                $member->member_code = 'M'.date('YmdHis');
                $member->email = $request->email;
                $member->password = bcrypt($request->password);
                $member->first_name = $request->first_name;
                $member->last_name = $request->last_name;
                $member->phone_number = $request->phone_number;
                $member->amount = 1;

                $member->company_name = $request->company_name;
                $member->company_type = $companytype;
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
                    return response()->json(['status' => 1]);
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

    public function forgotpassword_mail(Request $request)
    {
        $member = MemberModel::where('status', 1)->where('email', $request->email)->first();
        $data = [
            'id' => $member->id,
            'member_code' => $member->member_code,
            'email' => $member->email,
            'email_verified_at' => $member->email_verified_at,
            'password' => $member->password,
            'remember_token' => $member->remember_token,
            'first_name' => $member->first_name,
            'last_name' => $member->last_name,
            'phone_number' => $member->phone_number,
            'company_name' => $member->company_name,
            'company_type' => $member->company_type,
            'company_type_other' => $member->company_type_other,
            'address' => $member->address,
            'address_more' => $member->address_more,
            'city' => $member->city,
            'zip_code' => $member->zip_code,
            'country_region' => $member->country_region,
            'colleague_email' => $member->colleague_email,
            'last_login' => $member->last_login,
            'status' => $member->status,
            'created_at' => $member->created_at,
            'updated_at' => $member->updated_at,
        ];
        Mail::send(new MemberMail($data));
        return redirect()->to('/login')->with('email', 'The system has successfully sent the email.');
    }

    public function forgotpassword(Request $request, $id)
    {
        $member = MemberModel::find($id);
        $data = array(
            'member' => $member,
        );
        return view('layouts/frontend/forgot-password', $data);
    }

    public function forgotpassword_update(Request $request, $id)
    {
        // $member = MemberModel::find($id);
        if($request->password_1 == $request->password_2 && $request->password_1 != ""){
            $varible = Hash::make($request->password_1);
            MemberModel::find($id)->update([
                'password' => $varible,
                'updated_at' => Carbon::now()
            ]);
            // return redirect()->to('/member/Forgotpassword/'.$member->id)->with('success', 'Save Data Success');
            return redirect()->to('/login')->with('success', 'Save Data Success');
        }else{
            // return redirect()->to('/member/Forgotpassword/'.$member->id)->with('success', 'Save Data Success');
            return redirect()->to('/login')->with('success', 'Save Data Success');
        }
    }
}
