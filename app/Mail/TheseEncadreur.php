<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TheseEncadreur extends Mailable
{
    use Queueable, SerializesModels;
    public $encadreur, $these;
    /**
     * Create a new message instance.
     */
    public function __construct($encadreur, $these)
    {
        $this->encadreur = $encadreur;
        $this->these = $these;
    }

    public function build(){
        return $this->subject('Définition du projet de thèse')->view('emails.these_encadreur');
    }

    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'These Encadreur',
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

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
