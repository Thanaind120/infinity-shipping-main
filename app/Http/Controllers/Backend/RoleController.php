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
use App\Models\RoleModel;
use App\Models\RolePermissionModel;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $roles = RoleModel::get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::guard('web')->user()->position)->first();
        $data = array(
            'roles' => $roles,
            'check' => $check,
        );
        return view('layouts/backend/role/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/backend/role/form');
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
            $id_role = RoleModel::create([
                'id' => $request->id,
                'position_name' => $request->position_name,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $lastID = $id_role->id;
            RolePermissionModel::create([
                'ref_role' => $lastID,
                'home_create' => $request->home_create,
                'home_view' => $request->home_view,
                'home_edit' => $request->home_edit,
                'home_delete' => $request->home_delete,
                'aboutus_create' => $request->aboutus_create,
                'aboutus_view' => $request->aboutus_view,
                'aboutus_edit' => $request->aboutus_edit,
                'aboutus_delete' => $request->aboutus_delete,
                'service_create' => $request->service_create,
                'service_view' => $request->service_view,
                'service_edit' => $request->service_edit,
                'service_delete' => $request->service_delete,
                'price_create' => $request->price_create,
                'price_view' => $request->price_view,
                'price_edit' => $request->price_edit,
                'price_delete' => $request->price_delete,
                'booking_create' => $request->booking_create,
                'booking_view' => $request->booking_view,
                'booking_edit' => $request->booking_edit,
                'booking_delete' => $request->booking_delete,
                'schedules_create' => $request->schedules_create,
                'schedules_view' => $request->schedules_view,
                'schedules_edit' => $request->schedules_edit,
                'schedules_delete' => $request->schedules_delete,
                'contactus_create' => $request->contactus_create,
                'contactus_view' => $request->contactus_view,
                'contactus_edit' => $request->contactus_edit,
                'contactus_delete' => $request->contactus_delete,
                'management_create' => $request->management_create,
                'management_view' => $request->management_view,
                'management_edit' => $request->management_edit,
                'management_delete' => $request->management_delete,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/user-role')->with('success','Save Data Success');
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
        $roles = RoleModel::find($id);
        $role_permission = RolePermissionModel::where('ref_role',$id)->first();
        $data = array(
            'roles' => $roles,
            'role_permission' => $role_permission,
        );
        return view('layouts/backend/role/form', $data);
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
            if(isset($request->status)){
                $status = 1;
            }else{
                $status = 0;
            }
            RoleModel::find($id)->update([
                'position_name' => $request->position_name,
                'status' => $status,
                'updated_at' => Carbon::now()
            ]);
            RolePermissionModel::where('ref_role',$id)->update([
                'home_create' => $request->home_create,
                'home_view' => $request->home_view,
                'home_edit' => $request->home_edit,
                'home_delete' => $request->home_delete,
                'aboutus_create' => $request->aboutus_create,
                'aboutus_view' => $request->aboutus_view,
                'aboutus_edit' => $request->aboutus_edit,
                'aboutus_delete' => $request->aboutus_delete,
                'service_create' => $request->service_create,
                'service_view' => $request->service_view,
                'service_edit' => $request->service_edit,
                'service_delete' => $request->service_delete,
                'price_create' => $request->price_create,
                'price_view' => $request->price_view,
                'price_edit' => $request->price_edit,
                'price_delete' => $request->price_delete,
                'booking_create' => $request->booking_create,
                'booking_view' => $request->booking_view,
                'booking_edit' => $request->booking_edit,
                'booking_delete' => $request->booking_delete,
                'schedules_create' => $request->schedules_create,
                'schedules_view' => $request->schedules_view,
                'schedules_edit' => $request->schedules_edit,
                'schedules_delete' => $request->schedules_delete,
                'contactus_create' => $request->contactus_create,
                'contactus_view' => $request->contactus_view,
                'contactus_edit' => $request->contactus_edit,
                'contactus_delete' => $request->contactus_delete,
                'management_create' => $request->management_create,
                'management_view' => $request->management_view,
                'management_edit' => $request->management_edit,
                'management_delete' => $request->management_delete,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/user-role')->with('success','Save Data Success');
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
        RoleModel::find($id)->delete();
        RolePermissionModel::where('ref_role',$id)->delete();
        // $role = RoleModel::where('id',$id)->first();
        // $role_permission = RolePermissionModel::where('ref_role',$id)->first();
        // $role->status = 0;
        // $role_permission->page_create = NULL;
        // $role_permission->page_view = NULL;
        // $role_permission->page_edit = NULL;
        // $role_permission->page_delete = NULL;
        // $role->save();
        // $role_permission->save();
        // return  redirect()->to('/backend/user-role')->with('success','Delete Banner Success');
    }
}
