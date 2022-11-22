<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBannerModel extends Model
{
    protected $table = 'home_banner';
    protected $primaryKey = 'id';
    protected $fillable = ['id','img_banner','status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
