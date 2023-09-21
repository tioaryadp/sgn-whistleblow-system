<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class TiketEmail extends Mailable
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
            ->leftJoin("identitas", "tiket.tiket_identitas", "=", "identitas.identitas_id")
            ->leftJoin("provinsi", "identitas.identitas_provinsi", "=", "provinsi.provinsi_id")
            ->leftJoin("kota", "identitas.identitas_kota", "=", "kota.kota_id")
            ->leftJoin("kategori", "tiket.tiket_kategori", "=", "kategori.kategori_id")
            ->leftJoin("komunikasi", "tiket.tiket_komunikasi", "=", "komunikasi.komunikasi_id")
            ->leftJoin("laporan", "tiket.tiket_laporan", "=", "laporan.laporan_id")
            ->leftJoin("unit", "laporan.laporan_unit", "=", "unit.unit_id")
            ->leftJoin("bagian", "laporan.laporan_unitbagian", "=", "bagian.bagian_id")
            ->leftJoin("status", "tiket.tiket_status", "=", "status.status_id")
            ->leftJoin("pendukung", "tiket.tiket_pendukung", "=", "pendukung.pendukung_id")
            ->get();
        $this->header = DB::table('email_setting')->select('email_content')->where('email_slope', 'mail-header')->first();
        $this->footer = DB::table('email_setting')->select('email_content')->where('email_slope', 'mail-footer')->first();
    }

    public function build(){
        return $this->from('test@mail.com')
                    ->view('back.email')
                    ->with('data', $this->data)
                    ->with('email_header', $this->header->email_content)
                    ->with('email_footer', $this->footer->email_content);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Report is Successfully Created!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'back.email',
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
