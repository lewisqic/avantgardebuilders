<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Declare our public properties
     */
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $comments;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
        foreach ( $data as $key => $value ) {
            $this->{$key} = $value;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.index.contact')
            ->replyTo($this->email, $this->first_name . ' ' . $this->last_name)
            ->subject('Contact Form Results from ' . $this->first_name . ' ' . $this->last_name);

    }
}
