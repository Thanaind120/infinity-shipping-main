<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeLogisticsServiceTopicsModel extends Model
{
    protected $table = 'home_logis-service-topics';
    protected $primaryKey = 'id';
    protected $fillable = ['id','topic','content','status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
