<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newPass;
    public $username;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newPass, $username)
    {
        $this->newPass = $newPass;
        $this->username = $username;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('email.recovery')
            ->subject('بازیابی رمز عبور');
    }
}
