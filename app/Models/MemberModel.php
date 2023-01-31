<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'member_code', 'email', 'email_verified_at', 'password', 'remember_token', 'first_name', 'last_name', 'phone_number', 'company_name', 'company_type', 'company_type_other', 'address', 'address_more', 'city', 'zip_code', 'country_region', 'colleague_email', 'last_login', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
