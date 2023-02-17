<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeMainServicesModel extends Model
{
    protected $table = 'home_main-services';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'service_name', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
