<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $client = $user->clients()->first();

        abort_unless($client, 403, 'No client is assigned to this account.');

        $invoices = Invoice::query()
            ->where('client_id', $client->id)
            ->latest()
            ->paginate(20);

        return view('client.invoices.index', [
            'client' => $client,
            'invoices' => $invoices,
        ]);
    }
}
