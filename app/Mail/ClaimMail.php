<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClaimMail extends Mailable
{
    use Queueable, SerializesModels;

    public $istekler;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->istekler = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $request = $this->istekler;
        return $this->subject($request->topic)->markdown('emails.claim')->with('request', $request);
    }
}
