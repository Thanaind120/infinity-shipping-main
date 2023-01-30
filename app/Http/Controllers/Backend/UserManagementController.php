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
use App\Models\UserManagementModel;
use App\Models\RoleModel;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserManagementModel::leftJoin('role', 'users.position', '=', 'role.id')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        $data = array(
            'users' => $users,
            'check' => $check,
        );
        return view('layouts/backend/user-management/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = RoleModel::get();
        $data = array(
            'roles' => $roles,
        );
        return view('layouts/backend/user-management/form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->type == 1){  
            if($request->password_1 == $request->password_2 && $request->password_1 != ""){
                $varible = Hash::make($request->password_1);
                UserManagementModel::create([
                        'id' => $request->id,
                        'username' => $request->username,
                        'name' => $request->name,
                        'email' => $request->email,
                        'position' => $request->position,
                        'password' => $varible,
                        'status' => 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                return redirect()->to('/backend/user-management')->with('success', 'Save Data Success');
            }else{
                return redirect()->to('/backend/user-management')->with('success', 'Save Data Success');
            }
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
        $users = UserManagementModel::find($id);
        $roles = RoleModel::get();
        $data = array(
            'users' => $users,
            'roles' => $roles,
        );
        return view('layouts/backend/user-management/form', $data);
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
        if($request->type == 2){  
            if($request->password_1 == $request->password_2 && $request->password_1 != ""){
                $varible = Hash::make($request->password_1);
                if (isset($request->status)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                UserManagementModel::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'position' => $request->position,
                    'password' => $varible,
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
                if(Auth::user()->id == $id){
                    Auth::logout();$request->session()->invalidate();
                }
                return redirect()->to('/backend/user-management')->with('success', 'Save Data Success');
            }else{
                return redirect()->to('/backend/user-management')->with('success', 'Save Data Success');
            }
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
        UserManagementModel::find($id)->delete();
    }

    public function reset_password(Request $request) {
        $users = UserManagementModel::where('id',$request->id)->first();
        $users->password=Hash::make('hello123456');
        $users->save();
        return redirect()->to('/backend/user-management')->with('success','Reset Password Success');
    }
}
