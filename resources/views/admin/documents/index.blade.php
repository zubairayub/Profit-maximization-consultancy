<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Documents
            </h2>
            <a href="{{ route('admin.documents.create') }}" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500">
                Upload Document
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
                                    <th class="py-2 pr-4">Client</th>
                                    <th class="py-2 pr-4">Title</th>
                                    <th class="py-2 pr-4">Category</th>
                                    <th class="py-2 pr-4">Visible</th>
                                    <th class="py-2 pr-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($documents as $doc)
                                    <tr>
                                        <td class="py-3 pr-4 font-medium">{{ $doc->client?->name ?? '—' }}</td>
                                        <td class="py-3 pr-4">{{ $doc->title }}</td>
                                        <td class="py-3 pr-4">{{ $doc->category }}</td>
                                        <td class="py-3 pr-4">
                                            <span class="rounded-full bg-gray-100 px-2 py-1 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-200">
                                                {{ $doc->is_visible_to_client ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td class="py-3 pr-4 text-right space-x-3">
                                            <a class="text-emerald-600 hover:underline" href="{{ route('admin.documents.show', $doc) }}">Download</a>
                                            <a class="text-emerald-600 hover:underline" href="{{ route('admin.documents.edit', $doc) }}">Edit</a>
                                            <form class="inline" method="POST" action="{{ route('admin.documents.destroy', $doc) }}" onsubmit="return confirm('Delete this document?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-500 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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

