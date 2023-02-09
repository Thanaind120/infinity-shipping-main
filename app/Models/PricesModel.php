<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricesModel extends Model
{
    protected $table = 'prices_quote';
    protected $primaryKey = 'id_quote';
    protected $fillable = ['id_quote', 'quote_code', 'POL', 'VDF', 'POD', 'VDT', 'rate', 'privilege', 'privilege2', 'special_rate', 'additional_content', 'announce_content', 'equipment_type', 'weight', 'productQty', 'commodity', 'other', 'status', 'amount', 'created_id', 'created_by', 'save_datetime'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
