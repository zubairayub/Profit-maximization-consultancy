<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            User Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">{{ $user->name }}</h3>
                        <div class="space-y-2">
                            <div><strong>Email:</strong> {{ $user->email }}</div>
                            <div><strong>Role:</strong> 
                                <span class="px-2 py-1 text-xs rounded-full bg-pmc-teal/20 text-pmc-teal">
                                    {{ $user->roles->first()?->name ?? 'No Role' }}
                                </span>
                            </div>
                            <div><strong>Created:</strong> {{ $user->created_at->format('M d, Y') }}</div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Assigned Clients</h4>
                        @if($user->clients->count() > 0)
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($user->clients as $client)
                                    <li>{{ $client->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500 text-sm">No clients assigned.</p>
                        @endif
                    </div>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.users.edit', $user) }}" class="bg-pmc-teal hover:bg-pmc-emerald text-white px-6 py-2 rounded-lg">
                            Edit User
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
