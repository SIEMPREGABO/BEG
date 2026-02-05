<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Bienvenida extends Mailable //implements ShouldQueue para muchos correos
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $nombre_pila, $email, $token, $pathToImage;


     public function __construct($nombre_pila,$email,$token) //
    {
        $this->nombre_pila = $nombre_pila;
        $this->email = $email;
        $this->token = $token;
        $this->pathToImage = '/images/Logo_BEG.png';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bienvenido a BEG',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Bienvenida',
            
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
