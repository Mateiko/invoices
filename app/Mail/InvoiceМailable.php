<?php

namespace App\Mail;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\UnitOfMeasure;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceМailable extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Invoice Мailable',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $user = User::findOrFail($this->invoice->user_id);
        $client = Client::findOrFail($this->invoice->client_id);
        $invoice_item = InvoiceItem::where('invoice_id', '=', $this->invoice->id)->get();
        $units = UnitOfMeasure::all();
        return new Content(
            view: 'invoices.show',
            with: [
                'invoice' => $this->invoice,
                'client' => $client,
                'user' => $user,
                'invoice_item' => $invoice_item,
                'units' => $units,
            ],
        );
    }
}
