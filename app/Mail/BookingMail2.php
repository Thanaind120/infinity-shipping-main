<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class BookingMail2 extends Mailable
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
        ->to($this->data['email'])
        ->markdown('emails.BookingMail2')->with([
            'email' => $this->data['email'],
            'created_by' => $this->data['created_by'], 
       ]);
    }
    
}
