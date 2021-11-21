<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $phone;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $data )
    {
        Log::notice($data);
        $this->email = $data['email'];
        $this->phone = $data['phone_number'];
        $this->name = $data['name'];
        $this->body = $data['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contact mail from oasis website')
            ->view('emails.contact-us-email', [
                'email' => $this->email,
                'phone' => $this->phone,
                'name' => $this->name,
                'body' => $this->body,
            ]);
    }
}
