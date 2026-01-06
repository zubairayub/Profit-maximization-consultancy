<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Invoices & Payments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-sm text-gray-600 dark:text-gray-300">
                        Currency: <span class="font-semibold text-gray-900 dark:text-gray-100">USD</span> — Projects require <span class="font-semibold">50% advance</span> (where applicable).
                    </div>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="py-2 pr-4">Number</th>
                                    <th class="py-2 pr-4">Type</th>
                                    <th class="py-2 pr-4">Amount</th>
                                    <th class="py-2 pr-4">Advance</th>
                                    <th class="py-2 pr-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($invoices as $inv)
                                    <tr>
                                        <td class="py-3 pr-4 font-medium">{{ $inv->number }}</td>
                                        <td class="py-3 pr-4">{{ $inv->type }}</td>
                                        <td class="py-3 pr-4">${{ number_format((float)$inv->amount, 2) }}</td>
                                        <td class="py-3 pr-4">
                                            @if ($inv->advance_required_percent > 0)
                                                {{ $inv->advance_required_percent }}% / paid ${{ number_format((float)$inv->advance_paid_amount, 2) }}
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td class="py-3 pr-4">
                                            <span class="rounded-full bg-gray-100 px-2 py-1 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-200">{{ $inv->status }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="py-4 text-gray-600 dark:text-gray-300" colspan="5">
                                            No invoices yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $invoices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

