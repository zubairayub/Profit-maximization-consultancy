<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Page Content Manager
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-sm text-gray-600 dark:text-gray-300">
                        This MVP stores per-page content as JSON. Next step is adding a full WYSIWYG editor and structured fields.
                    </div>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="py-2 pr-4">Key</th>
                                    <th class="py-2 pr-4">Title</th>
                                    <th class="py-2 pr-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($pages as $p)
                                    <tr>
                                        <td class="py-3 pr-4 font-medium">{{ $p->key }}</td>
                                        <td class="py-3 pr-4">{{ $p->title ?? '—' }}</td>
                                        <td class="py-3 pr-4 text-right">
                                            <a class="text-emerald-600 hover:underline" href="{{ route('admin.pages.edit', $p) }}">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

