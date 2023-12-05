<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMail extends Mailable 
{
    use Queueable, SerializesModels;

    public $from;
    public $subject;
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail)
    {  
    
       $this->mail=$mail;
       $this->subject=$mail->subject;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mail->from)
                    ->view('mail.mail');
    }
}
