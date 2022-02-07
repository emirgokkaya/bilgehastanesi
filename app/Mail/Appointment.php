<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Appointment extends Mailable
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
        return $this->subject($request->source)->markdown('emails.appointment')->with('request', $request);
    }
}
