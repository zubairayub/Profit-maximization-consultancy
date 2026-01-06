<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Document
        </h2>
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
                    <form method="POST" action="{{ route('admin.documents.update', $document) }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="text-sm font-medium">Client</label>
                            <select name="client_id" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                                @foreach ($clients as $c)
                                    <option value="{{ $c->id }}" @selected(old('client_id', $document->client_id) == $c->id)>{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('client_id') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium">Category</label>
                                <select name="category" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                                    @foreach (['monthly_report' => 'Monthly Report', 'quarterly_report' => 'Quarterly Report', 'board_pack' => 'Board Pack', 'other' => 'Other'] as $v => $l)
                                        <option value="{{ $v }}" @selected(old('category', $document->category) === $v)>{{ $l }}</option>
                                    @endforeach
                                </select>
                                @error('category') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                            </div>
                            <div class="flex items-end gap-3">
                                <label class="inline-flex items-center gap-2">
                                    <input type="checkbox" name="is_visible_to_client" value="1" class="rounded border-gray-300 dark:border-gray-700" @checked(old('is_visible_to_client', $document->is_visible_to_client))>
                                    <span class="text-sm">Visible to client</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium">Title</label>
                            <input name="title" value="{{ old('title', $document->title) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required />
                            @error('title') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium">Period Start (optional)</label>
                                <input type="date" name="period_start" value="{{ old('period_start', optional($document->period_start)->format('Y-m-d')) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                            <div>
                                <label class="text-sm font-medium">Period End (optional)</label>
                                <input type="date" name="period_end" value="{{ old('period_end', optional($document->period_end)->format('Y-m-d')) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            </div>
                        </div>

                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            File: {{ $document->file_path }} (re-upload is not enabled in this MVP; delete & upload again if needed)
                        </div>

                        <div class="flex gap-3">
                            <button class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500">
                                Save
                            </button>
                            <a href="{{ route('admin.documents.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-900">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

