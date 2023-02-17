<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeInfinityContentModel extends Model
{
    protected $table = 'home_infinity-content';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'topic', 'content', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
