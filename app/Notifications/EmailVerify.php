<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerify extends Mailable
{


    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


     public $data;

    public function __construct($data)
    {
     $this->user=$data['Email'];
     $this->user_id=$data['user_id'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {     
        return $this->subject('Email Verify')
                    ->to($this->user)
                    ->view('mail.registrationmail',['user_id'=>$this->user_id]);
    }
}
