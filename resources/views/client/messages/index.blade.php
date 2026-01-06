<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Message Board
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-3 text-sm text-gray-900 dark:text-gray-100">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid gap-6 lg:grid-cols-3">
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="text-sm text-gray-600 dark:text-gray-300">
                            Confidential communication for: <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $client->name }}</span>
                        </div>

                        <div class="mt-6 space-y-4">
                            @forelse ($messages as $m)
                                <div class="rounded-lg border border-gray-200 p-4 text-sm dark:border-gray-700">
                                    <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                                        <span>{{ $m->created_at->format('Y-m-d H:i') }}</span>
                                        <span>{{ $m->user?->name ?? 'User' }}</span>
                                    </div>
                                    <div class="mt-2 whitespace-pre-line">{{ $m->body }}</div>
                                </div>
                            @empty
                                <div class="text-sm text-gray-600 dark:text-gray-300">
                                    No messages yet.
                                </div>
                            @endforelse
                        </div>

                        <div class="mt-6">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="font-semibold">Send a message</div>
                        <form method="POST" action="{{ route('client.messages.store') }}" class="mt-4 space-y-3">
                            @csrf
                            <textarea name="body" rows="6" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>{{ old('body') }}</textarea>
                            @error('body') <div class="text-sm text-red-400">{{ $message }}</div> @enderror
                            <button class="w-full rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500">
                                Send
                            </button>
                        </form>
                        <div class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                            Attachments and threaded discussions can be enabled in the next iteration.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

