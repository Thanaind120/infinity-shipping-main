<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Loginmember extends Authenticatable
{
    use Notifiable;

    protected $table = "members";

    protected $fillable = [
        'email', 'password', 'status', 'remember_token'
    ];
    /*     protected $hidden = [
        'password', 'remember_token',
    ]; */

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamp = false;
}
