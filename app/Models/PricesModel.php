<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricesModel extends Model
{
    protected $table = 'prices_quote';
    protected $primaryKey = 'id_quote';
    protected $fillable = ['id_quote', 'location', 'POL', 'ETD', 'POD', 'equipment_type', 'weight', 'productQty', 'commodity', 'other', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
