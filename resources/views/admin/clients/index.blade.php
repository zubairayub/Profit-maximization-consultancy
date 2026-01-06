<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Clients
            </h2>
            <a href="{{ route('admin.clients.create') }}" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500">
                New Client
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-3 text-sm text-gray-900 dark:text-gray-100">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="py-2 pr-4">Name</th>
                                    <th class="py-2 pr-4">Tier</th>
                                    <th class="py-2 pr-4">Revenue Band</th>
                                    <th class="py-2 pr-4">Status</th>
                                    <th class="py-2 pr-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($clients as $client)
                                    <tr>
                                        <td class="py-3 pr-4">
                                            <div class="font-semibold">{{ $client->name }}</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $client->slug }}</div>
                                        </td>
                                        <td class="py-3 pr-4">{{ $client->package_tier ?? '—' }}</td>
                                        <td class="py-3 pr-4">{{ $client->revenue_band ?? '—' }}</td>
                                        <td class="py-3 pr-4">
                                            <span class="rounded-full bg-gray-100 px-2 py-1 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-200">
                                                {{ $client->status }}
                                            </span>
                                        </td>
                                        <td class="py-3 pr-4 text-right">
                                            <a class="text-emerald-600 hover:underline" href="{{ route('admin.clients.edit', $client) }}">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

