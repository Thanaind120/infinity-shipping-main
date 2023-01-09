<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricesModel extends Model
{
    protected $table = 'prices_quote';
    protected $primaryKey = 'id_quote';
    protected $fillable = ['id_quote', 'POL', 'VDF', 'POD', 'VDT', 'rate', 'privilege', 'special_rate', 'equipment_type', 'weight', 'productQty', 'commodity', 'other', 'status', 'created_id', 'created_by'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
