<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class StatusEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($id)
    {
        $this->data= 
            DB::table('tiket')->where('tiket.tiket_id', $id)
            ->leftJoin("status", "tiket.tiket_status", "=", "status.status_id")
            ->get();
        $this->content = DB::table('email_setting')->select('email_content')->where('email_slope', 'status-mail-content')->first();
    }

    public function build(){
        return $this->from('test@mail.com')
                    ->view('back.email-status')
                    ->with('data', $this->data)
                    ->with('email_content', $this->content->email_content);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Report Status is Changed!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'back.email-status',
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
