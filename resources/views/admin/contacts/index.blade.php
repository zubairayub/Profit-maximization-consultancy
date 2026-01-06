<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Contact Submissions
        </h2>
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
                                    <th class="py-2 pr-4">When</th>
                                    <th class="py-2 pr-4">Interest</th>
                                    <th class="py-2 pr-4">Company</th>
                                    <th class="py-2 pr-4">Name</th>
                                    <th class="py-2 pr-4">Status</th>
                                    <th class="py-2 pr-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($contacts as $c)
                                    <tr>
                                        <td class="py-3 pr-4 text-xs text-gray-500 dark:text-gray-400">{{ $c->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="py-3 pr-4 font-medium">{{ $c->interest }}</td>
                                        <td class="py-3 pr-4">{{ $c->company }} <div class="text-xs text-gray-500 dark:text-gray-400">{{ $c->company_size }}</div></td>
                                        <td class="py-3 pr-4">{{ $c->name }} <div class="text-xs text-gray-500 dark:text-gray-400">{{ $c->title }}</div></td>
                                        <td class="py-3 pr-4"><span class="rounded-full bg-gray-100 px-2 py-1 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-200">{{ $c->status }}</span></td>
                                        <td class="py-3 pr-4 text-right">
                                            <a class="text-emerald-600 hover:underline" href="{{ route('admin.contacts.show', $c) }}">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

