<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class e3_app_sub extends Mailable
{
    public $app_sub_data;

    use Queueable, SerializesModels;

    // create a new message instance

    public function __construct($app_sub_data)
    {
        $this->app_sub_data=$app_sub_data;
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
            view: 'emails.E3_app_sub'
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
