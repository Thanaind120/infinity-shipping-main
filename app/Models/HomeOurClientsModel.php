<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeOurClientsModel extends Model
{
    protected $table = 'home_our-clients';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'img_logo', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
