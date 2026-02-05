<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class Notification extends Mailable 
{
    use Queueable, SerializesModels;

    public $header, $subject, $body, $footer, $imagePath;

    /**
     * Create a new message instance.
     */
    public function __construct($subject,
    $header,
    $body,
    $footer,
    $imagePath)
    {
        $this->subject = $subject;
        $this->header = $header;
        $this->body = $body;
        $this->footer = $footer;
        $this->imagePath = '/images/Notificacion.jpg';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Notificacion',
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
