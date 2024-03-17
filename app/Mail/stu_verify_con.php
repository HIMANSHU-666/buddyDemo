<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class stu_verify_con extends Mailable
{
    public $stu_con_data;

    use Queueable, SerializesModels;

    // create a new message instance

    public function __construct($stu_con_data)
    {
        $this->stu_con_data=$stu_con_data;
    }

    // Get the message envelop

    public function envelope(): Envelope
    {

        return new Envelope(
            subject: 'Email Notification'
        );

    }

    // Get the message content defintion

    public function content(): content
    {

        return new Content(
            view: 'emails.stu_verify_con'
        );

    }

    /** 
     * get the attatchment for the message
     * 
     * @return array<int.\Illuminate\Mail\Mailables\Attatchment>

    */

    public function attachments(): array
    {
        return [];
    }


}
