<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre, $email, $phone, $subject, $body;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $email, $phone, $subject, $body)
    {
        $this->nombre = $nombre; // Corrección
        $this->email = $email;   // Corrección
        $this->phone = $phone;   // Corrección
        $this->subject = $subject; // Corrección
        $this->body = $body; // Corrección
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'Contacto',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

