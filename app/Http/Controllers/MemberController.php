<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
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
        // dd('asdasdasd');
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required',
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
            dd($request->all());
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
