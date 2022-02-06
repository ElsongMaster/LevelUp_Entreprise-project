<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Recaptacherestante extends Mailable
{
    use Queueable, SerializesModels;
    public $donneeTache = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Array $donneeTache)
    {
        $this->donneeTache = $donneeTache;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recaptacherestante');
    }
}
