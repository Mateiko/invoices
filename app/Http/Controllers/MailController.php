<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceМailable;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\UnitOfMeasure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($invoice)
    {
        $invoice = Invoice::findOrFail($invoice);
        $client = Client::findOrFail($invoice->client_id);
        Mail::to("$client->email")->send(new InvoiceМailable($invoice));
        return redirect('invoices/' . $invoice->id)
            ->withSuccess('Invoice mail has been sent to ' . $client->email);
    }
}
