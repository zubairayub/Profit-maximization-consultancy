<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" required value="{{ old('name') }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" required value="{{ old('email') }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                            <input type="password" name="password" required 
                                class="mt-1 block w-full rounded-lg border-gray-300">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                            <input type="password" name="password_confirmation" required 
                                class="mt-1 block w-full rounded-lg border-gray-300">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                            <select name="role" required class="mt-1 block w-full rounded-lg border-gray-300">
                                <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                                <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>Editor</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Assign Clients (optional)</label>
                            <div class="space-y-2 max-h-48 overflow-y-auto border border-gray-300 rounded-lg p-3">
                                @foreach($clients as $client)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="client_ids[]" value="{{ $client->id }}" 
                                            {{ in_array($client->id, old('client_ids', [])) ? 'checked' : '' }}
                                            class="rounded border-gray-300">
                                        <span class="ml-2">{{ $client->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Leave unchecked if user should not have client access yet.</p>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="bg-pmc-teal hover:bg-pmc-emerald text-white px-6 py-2 rounded-lg">
                                Create User
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
