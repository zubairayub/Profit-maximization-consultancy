<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Report Vault
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-sm text-gray-600 dark:text-gray-300">
                        Secure reports for: <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $client->name }}</span>
                    </div>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="py-2 pr-4">Title</th>
                                    <th class="py-2 pr-4">Category</th>
                                    <th class="py-2 pr-4">Period</th>
                                    <th class="py-2 pr-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($documents as $doc)
                                    <tr>
                                        <td class="py-3 pr-4 font-medium">{{ $doc->title }}</td>
                                        <td class="py-3 pr-4">{{ $doc->category }}</td>
                                        <td class="py-3 pr-4">
                                            @if ($doc->period_start || $doc->period_end)
                                                {{ optional($doc->period_start)->format('Y-m-d') }} → {{ optional($doc->period_end)->format('Y-m-d') }}
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td class="py-3 pr-4 text-right">
                                            <a class="text-emerald-600 hover:underline" href="{{ route('client.reports.show', $doc) }}">Download</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="py-4 text-gray-600 dark:text-gray-300" colspan="4">
                                            No reports uploaded yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $documents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

