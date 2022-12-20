<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricesPortOfDischargeModel extends Model
{
    protected $table = 'prices_pod';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'POD_name', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
