<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::query()->with('client')->latest()->paginate(20);

        return view('admin.invoices.index', [
            'invoices' => $invoices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::query()->orderBy('name')->get();

        return view('admin.invoices.create', [
            'clients' => $clients,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => ['required', 'integer', 'exists:clients,id'],
            'number' => ['required', 'string', 'max:64', 'unique:invoices,number'],
            'type' => ['required', 'string', 'max:32'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', 'max:32'],
            'issued_at' => ['nullable', 'date'],
            'due_at' => ['nullable', 'date'],
            'paid_at' => ['nullable', 'date'],
            'advance_required_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'advance_paid_amount' => ['nullable', 'numeric', 'min:0'],
            'success_fee_percent' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'incremental_profit_amount' => ['nullable', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string', 'max:4000'],
        ]);

        $invoice = Invoice::create([
            'client_id' => $validated['client_id'],
            'issued_by' => Auth::id(),
            'number' => $validated['number'],
            'type' => $validated['type'],
            'currency' => 'USD',
            'amount' => $validated['amount'],
            'status' => $validated['status'],
            'issued_at' => $validated['issued_at'] ?? null,
            'due_at' => $validated['due_at'] ?? null,
            'paid_at' => $validated['paid_at'] ?? null,
            'advance_required_percent' => $validated['advance_required_percent'] ?? 0,
            'advance_paid_amount' => $validated['advance_paid_amount'] ?? 0,
            'success_fee_percent' => $validated['success_fee_percent'] ?? null,
            'incremental_profit_amount' => $validated['incremental_profit_amount'] ?? null,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('admin.invoices.edit', $invoice)->with('status', 'Invoice created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return redirect()->route('admin.invoices.edit', $invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::query()->orderBy('name')->get();

        return view('admin.invoices.edit', [
            'invoice' => $invoice,
            'clients' => $clients,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'client_id' => ['required', 'integer', 'exists:clients,id'],
            'number' => ['required', 'string', 'max:64', 'unique:invoices,number,'.$invoice->id],
            'type' => ['required', 'string', 'max:32'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', 'max:32'],
            'issued_at' => ['nullable', 'date'],
            'due_at' => ['nullable', 'date'],
            'paid_at' => ['nullable', 'date'],
            'advance_required_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'advance_paid_amount' => ['nullable', 'numeric', 'min:0'],
            'success_fee_percent' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'incremental_profit_amount' => ['nullable', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string', 'max:4000'],
        ]);

        $invoice->update([
            'client_id' => $validated['client_id'],
            'number' => $validated['number'],
            'type' => $validated['type'],
            'currency' => 'USD',
            'amount' => $validated['amount'],
            'status' => $validated['status'],
            'issued_at' => $validated['issued_at'] ?? null,
            'due_at' => $validated['due_at'] ?? null,
            'paid_at' => $validated['paid_at'] ?? null,
            'advance_required_percent' => $validated['advance_required_percent'] ?? 0,
            'advance_paid_amount' => $validated['advance_paid_amount'] ?? 0,
            'success_fee_percent' => $validated['success_fee_percent'] ?? null,
            'incremental_profit_amount' => $validated['incremental_profit_amount'] ?? null,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('admin.invoices.edit', $invoice)->with('status', 'Invoice updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('admin.invoices.index')->with('status', 'Invoice deleted.');
    }
}
