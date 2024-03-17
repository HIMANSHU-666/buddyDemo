<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Uni_offer_letter_mail extends Mailable
{
    public $mailData;

    use Queueable, SerializesModels;

    // create a new message instance

    public function __construct($mailData)
    {
        $this->mailData=$mailData;
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
            view: 'emails.uni_gen_offer_letter'
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
