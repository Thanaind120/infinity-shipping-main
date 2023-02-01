<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Booking Confirmation')
        ->from('smtp.mailer2022@gmail.com') 
        ->to('thanai.ots2565@gmail.com')
        ->markdown('emails.BookingMail')->with([
            'company_name' => $this->data['company_name'],
            'customer_name' => $this->data['customer_name'],
            'booking_party' => $this->data['booking_party'],
            'actual_shipper' => $this->data['actual_shipper'],
            'POL' => $this->data['POL'],
            'POD' => $this->data['POD'], 
            'ETD' => $this->data['ETD'], 
            'commodity' => $this->data['commodity'], 
            'other' => $this->data['other'], 
            'rate' => $this->data['rate'], 
            'pickup_date' => $this->data['pickup_date'], 
            'return_date' => $this->data['return_date'], 
            'term' => $this->data['term'], 
            'container_type' => $this->data['container_type'], 
            'gross_weight' => $this->data['gross_weight'], 
            'ocean_freight' => $this->data['ocean_freight'], 
            'created_by' => $this->data['created_by'], 
       ]);
  
    }
    
}
