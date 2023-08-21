<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageDoctorant extends Mailable
{
    use Queueable, SerializesModels;
    public $doctorant;
    public $link;
    public $password;
    /**
     * Create a new message instance.
     */
    public function __construct($doctorant, $link, $password)
    {
        $this->doctorant = $doctorant;
        $this->link = $link;
        $this->password = $password;
    }
    
    public function build(){
        return $this->subject('Création de votre compte doctorant')->view('emails.message_doctorant');
    }
    
    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Message Doctorant',
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
