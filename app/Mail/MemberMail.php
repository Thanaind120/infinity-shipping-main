<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class MemberMail extends Mailable
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
        $this->subject('Password confirmation email')
        ->from('smtp.mailer2022@gmail.com') 
        ->to($this->data['email'])
       ->markdown('emails.MemberMail')->with([
            'id' => $this->data['id'],
            'member_code' => $this->data['member_code'],
            'email' => $this->data['email'],
            'email_verified_at' => $this->data['email_verified_at'],
            'password' => $this->data['password'],
            'remember_token' => $this->data['remember_token'],
            'first_name' => $this->data['first_name'],
            'last_name' => $this->data['last_name'],
            'phone_number' => $this->data['phone_number'],
            'company_name' => $this->data['company_name'],
            'company_type' => $this->data['company_type'],
            'company_type_other' => $this->data['company_type_other'],
            'address' => $this->data['address'],
            'address_more' => $this->data['address_more'],
            'city' => $this->data['city'],
            'zip_code' => $this->data['zip_code'],
            'country_region' => $this->data['country_region'],
            'colleague_email' => $this->data['colleague_email'],
            'last_login' => $this->data['last_login'],
            'status' => $this->data['status'],
            'created_at' => $this->data['created_at'],
            'updated_at' => $this->data['updated_at'],
       ]);
  
    }
    
}
