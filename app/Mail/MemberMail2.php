<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class MemberMail2 extends Mailable
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
        $this->subject('Quotation confirmation email')
        ->from('smtp.mailer2022@gmail.com') 
        ->to($this->data['email'])
        ->markdown('emails.MemberMail2')->with([
            'first_name' => $this->data['first_name'],
            'last_name' => $this->data['last_name'],
            'email' => $this->data['email'],
        ]);
    }
    
}
