<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermissionModel extends Model
{
    protected $table = 'role_permission';
    protected $primaryKey = 'id_permission';
    protected $fillable = ['id_permission', 'ref_role', 'home_create', 'home_view', 'home_edit', 'home_delete', 'aboutus_create', 'aboutus_view', 'aboutus_edit', 'aboutus_delete', 'service_create', 'service_view', 'service_edit', 'service_delete', 'price_create', 'price_view', 'price_edit', 'price_delete', 'booking_create', 'booking_view', 'booking_edit', 'booking_delete', 'schedules_create', 'schedules_view', 'schedules_edit', 'schedules_delete', 'contactus_create', 'contactus_view', 'contactus_edit', 'contactus_delete', 'management_create', 'management_view', 'management_edit', 'management_delete', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
