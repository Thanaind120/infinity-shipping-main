<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserManagementModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'username', 'name', 'email', 'position', 'email_verified_at', 'password', 'remember_token', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
