<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Submission — {{ $contact->company }}
            </h2>
            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Delete this submission?');">
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
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Interest</div>
                            <div class="font-semibold">{{ $contact->interest }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Company size</div>
                            <div class="font-semibold">{{ $contact->company_size }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Name / Title</div>
                            <div class="font-semibold">{{ $contact->name }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">{{ $contact->title }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Email / Phone</div>
                            <div class="font-semibold">{{ $contact->email }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">{{ $contact->phone ?? '—' }}</div>
                        </div>
                    </div>

                    <div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Challenge</div>
                        <div class="mt-2 whitespace-pre-line rounded-lg border border-gray-200 p-4 text-sm dark:border-gray-700">
                            {{ $contact->challenge }}
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.contacts.update', $contact) }}" class="flex items-end gap-3">
                        @csrf
                        @method('PUT')
                        <div class="flex-1">
                            <label class="text-sm font-medium">Status</label>
                            <select name="status" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                @foreach (['new', 'reviewing', 'qualified', 'declined', 'closed'] as $s)
                                    <option value="{{ $s }}" @selected($contact->status === $s)>{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500">
                            Update
                        </button>
                    </form>

                    <div>
                        <a class="text-emerald-600 hover:underline" href="{{ route('admin.contacts.index') }}">Back to inbox</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

