<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageEncadreur extends Mailable
{
    use Queueable, SerializesModels;
    public $encadreur;
    public $link;

    /**
     * Create a new message instance.
     */
    public function __construct($encadreur, $link)
    {
        $this->encadreur = $encadreur;
        $this->link = $link;
    }

    public function build(){
        return $this->subject('Création de votre compte encadreur')->view('emails.message_encadreur');
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Message Encadreur',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
