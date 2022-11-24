<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeImageModel extends Model
{
    protected $table = 'home_image';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'img_image', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
