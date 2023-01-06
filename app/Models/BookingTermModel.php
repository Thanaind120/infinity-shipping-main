<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingTermModel extends Model
{
    protected $table = 'term';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'term', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
