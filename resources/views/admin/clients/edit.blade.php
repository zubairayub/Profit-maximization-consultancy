<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Client — {{ $client->name }}
            </h2>
            <form method="POST" action="{{ route('admin.clients.destroy', $client) }}" onsubmit="return confirm('Delete this client?');">
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
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.clients.update', $client) }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="text-sm font-medium">Name</label>
                            <input name="name" value="{{ old('name', $client->name) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required />
                            @error('name') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                        </div>

                        <div>
                            <label class="text-sm font-medium">Slug</label>
                            <input name="slug" value="{{ old('slug', $client->slug) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" required />
                            @error('slug') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium">Package Tier</label>
                                <select name="package_tier" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                    <option value="">—</option>
                                    @foreach (['silver' => 'Silver', 'gold' => 'Gold', 'platinum' => 'Platinum', 'project' => 'Project'] as $v => $l)
                                        <option value="{{ $v }}" @selected(old('package_tier', $client->package_tier) === $v)>{{ $l }}</option>
                                    @endforeach
                                </select>
                                @error('package_tier') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                            </div>

                            <div>
                                <label class="text-sm font-medium">Revenue Band</label>
                                <select name="revenue_band" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                    <option value="">—</option>
                                    @foreach (['>$50M Revenue', '>$100M Revenue', '>$1B Revenue'] as $band)
                                        <option value="{{ $band }}" @selected(old('revenue_band', $client->revenue_band) === $band)>{{ $band }}</option>
                                    @endforeach
                                </select>
                                @error('revenue_band') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium">Industry</label>
                                <input name="industry" value="{{ old('industry', $client->industry) }}" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                                @error('industry') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label class="text-sm font-medium">Status</label>
                                <select name="status" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                    <option value="active" @selected(old('status', $client->status) === 'active')>Active</option>
                                    <option value="inactive" @selected(old('status', $client->status) === 'inactive')>Inactive</option>
                                </select>
                                @error('status') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium">Primary User (optional)</label>
                            <select name="primary_user_id" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                <option value="">—</option>
                                @foreach ($clientUsers as $u)
                                    <option value="{{ $u->id }}" @selected(old('primary_user_id', $client->primary_user_id) == $u->id)>{{ $u->name }} ({{ $u->email }})</option>
                                @endforeach
                            </select>
                            @error('primary_user_id') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                        </div>

                        <div>
                            <label class="text-sm font-medium">Notes (optional)</label>
                            <textarea name="notes" rows="4" class="mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900">{{ old('notes', $client->notes) }}</textarea>
                            @error('notes') <div class="mt-1 text-sm text-red-400">{{ $message }}</div> @enderror
                        </div>

                        <div class="flex gap-3">
                            <button class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500">
                                Save
                            </button>
                            <a href="{{ route('admin.clients.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-900">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

