<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'position_name', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
