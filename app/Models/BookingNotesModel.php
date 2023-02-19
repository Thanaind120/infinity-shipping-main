<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingNotesModel extends Model
{
    protected $table = 'booking_notes';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'remark', 'note', 'status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
