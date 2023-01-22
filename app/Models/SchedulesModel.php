<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchedulesModel extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'id_schedules';
    protected $fillable = ['id_schedules', 'transport_code', 'ref_id_booking', 'ref_shipment_code', 'city_name', 'location', 'transport_status', 'ship_code', 'save_datetime', 'status', 'created_id', 'created_by'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
