<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id_booking';
    protected $fillable = ['id_booking', 'ref_id_quote', 'ref_quote_code', 'shipment_code', 'company_name', 'customer_name', 'booking_party', 'actual_shipper', 'POL', 'ETD', 'departure', 'place_of_departure', 'EVV', 'POD', 'ETA', 'arrival', 'place_of_arrival', 'commodity', 'other', 'rate', 'pickup_date', 'return_date', 'term', 'container_type', 'gross_weight', 'ocean_freight', 'status', 'amount', 'created_id', 'created_by'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
