<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = 'abouts';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'img_about', 'description', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
