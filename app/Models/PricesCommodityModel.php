<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricesCommodityModel extends Model
{
    protected $table = 'prices_commodity';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'commodity_name', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
