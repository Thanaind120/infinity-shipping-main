<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricesPortOfLoadingModel extends Model
{
    protected $table = 'prices_pol';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'POL_name', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
