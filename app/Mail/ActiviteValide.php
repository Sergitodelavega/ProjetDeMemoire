<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ActiviteValide extends Mailable
{
    use Queueable, SerializesModels;
    public $comments, $activity;
    /**
     * Create a new message instance.
     */
    public function __construct($comments, $activity)
    {
        $this->comments = $comments;
        $this->activity = $activity;
    }

    
    public function build(){
        return $this->subject('Votre activité a été validée avec succès')->view('emails.valide');
    }
    /**
     * Get the message envelope.
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Activite Valide',
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
