<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplication extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $request, $fileNameToStore;
    public function __construct($request, $fileNameToStore)
    {
        $this->request = $request;
        $this->fileNameToStore = $fileNameToStore;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $request = $this->request;
        return $this->subject($request->ad_soyad)->markdown('emails.job_application')
            ->with('request', $request)
            ->with('fileNameToStore', $this->fileNameToStore);
    }
}
