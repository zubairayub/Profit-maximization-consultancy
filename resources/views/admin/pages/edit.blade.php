<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Page Content — {{ $page->key }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-3 text-sm text-gray-900 dark:text-gray-100">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.pages.update', $page) }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="text-sm font-medium">Title</label>
                            <input name="title" value="{{ old('title', $page->title) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                            @error('title') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                        </div>

                        <div>
                            <label class="text-sm font-medium">WYSIWYG Body (stored as <code>content.body_html</code>)</label>
                            <input id="body_html" type="hidden" name="body_html" value="{{ old('body_html', data_get($page->content, 'body_html', '')) }}">
                            <trix-editor input="body_html" class="mt-2 rounded-lg border border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"></trix-editor>
                            @error('body_html') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                            <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                Use this for editable sections. Keep JSON below for advanced/structured content.
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium">Content JSON</label>
                            <textarea name="content_json" rows="14" class="mt-2 w-full rounded-lg border-gray-300 font-mono text-xs dark:border-gray-700 dark:bg-gray-900">{{ old('content_json', json_encode($page->content ?? [], JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)) }}</textarea>
                            @error('content_json') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                            <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                Tip: keep this valid JSON. We’ll replace this with a WYSIWYG + structured fields next.
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <button class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500">
                                Save
                            </button>
                            <a href="{{ route('admin.pages.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-900">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/trix@2.1.1/dist/trix.css">
    @endpush
    @push('scripts')
        <script src="https://unpkg.com/trix@2.1.1/dist/trix.umd.min.js"></script>
    @endpush
</x-app-layout>

