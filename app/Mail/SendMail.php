<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_content)
    {
        $this->mail_content = $mail_content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mail_content['hospital'])->view('components.emails.mail');
    }
}
