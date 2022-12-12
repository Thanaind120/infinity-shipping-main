<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricesEquipmentTypeModel extends Model
{
    protected $table = 'prices_equipment-type';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'device_name', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
