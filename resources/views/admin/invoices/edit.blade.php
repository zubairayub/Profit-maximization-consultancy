<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Invoice — {{ $invoice->number }}
            </h2>
            <form method="POST" action="{{ route('admin.invoices.destroy', $invoice) }}" onsubmit="return confirm('Delete this invoice?');">
                @csrf
                @method('DELETE')
                <button class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500">
                    Delete
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-3 text-sm text-gray-900 dark:text-gray-100">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.invoices.update', $invoice) }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="text-sm font-medium">Client</label>
                            <select name="client_id" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                                @foreach ($clients as $c)
                                    <option value="{{ $c->id }}" @selected(old('client_id', $invoice->client_id) == $c->id)>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium">Invoice Number</label>
                                <input name="number" value="{{ old('number', $invoice->number) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required />
                            </div>
                            <div>
                                <label class="text-sm font-medium">Type</label>
                                <select name="type" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                                    @foreach (['retainer' => 'Retainer', 'project' => 'Project (50% advance)', 'success_fee' => 'Success Fee'] as $v => $l)
                                        <option value="{{ $v }}" @selected(old('type', $invoice->type) === $v)>{{ $l }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium">Amount (USD)</label>
                                <input name="amount" value="{{ old('amount', $invoice->amount) }}" type="number" step="0.01" min="0" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required />
                            </div>
                            <div>
                                <label class="text-sm font-medium">Status</label>
                                <select name="status" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                                    @foreach (['draft', 'sent', 'partially_paid', 'paid', 'overdue', 'void'] as $s)
                                        <option value="{{ $s }}" @selected(old('status', $invoice->status) === $s)>{{ $s }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-3">
                            <div>
                                <label class="text-sm font-medium">Issued At</label>
                                <input type="date" name="issued_at" value="{{ old('issued_at', optional($invoice->issued_at)->format('Y-m-d')) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                            <div>
                                <label class="text-sm font-medium">Due At</label>
                                <input type="date" name="due_at" value="{{ old('due_at', optional($invoice->due_at)->format('Y-m-d')) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                            <div>
                                <label class="text-sm font-medium">Paid At</label>
                                <input type="date" name="paid_at" value="{{ old('paid_at', optional($invoice->paid_at)->format('Y-m-d')) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium">Advance Required % (projects)</label>
                                <input name="advance_required_percent" value="{{ old('advance_required_percent', $invoice->advance_required_percent) }}" type="number" min="0" max="100" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                            <div>
                                <label class="text-sm font-medium">Advance Paid Amount (USD)</label>
                                <input name="advance_paid_amount" value="{{ old('advance_paid_amount', $invoice->advance_paid_amount) }}" type="number" step="0.01" min="0" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium">Success Fee %</label>
                                <input name="success_fee_percent" value="{{ old('success_fee_percent', $invoice->success_fee_percent) }}" type="number" step="0.01" min="0" max="100" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                            <div>
                                <label class="text-sm font-medium">Incremental Profit (USD)</label>
                                <input name="incremental_profit_amount" value="{{ old('incremental_profit_amount', $invoice->incremental_profit_amount) }}" type="number" step="0.01" min="0" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium">Notes</label>
                            <textarea name="notes" rows="4" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900">{{ old('notes', $invoice->notes) }}</textarea>
                        </div>

                        <div class="flex gap-3">
                            <button class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500">
                                Save
                            </button>
                            <a href="{{ route('admin.invoices.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-900">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

