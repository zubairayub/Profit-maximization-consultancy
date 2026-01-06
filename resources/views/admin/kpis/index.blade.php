<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                KPI Metrics Management
            </h2>
            <a href="{{ route('admin.kpis.create') }}" class="bg-pmc-teal hover:bg-pmc-emerald text-white px-4 py-2 rounded-lg">
                + Add KPI Metric
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="GET" class="mb-6 flex gap-4">
                        <select name="client_id" class="rounded-lg border-gray-300">
                            <option value="">All Clients</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                        <select name="metric_name" class="rounded-lg border-gray-300">
                            <option value="">All Metrics</option>
                            @foreach($metricNames as $name)
                                <option value="{{ $name }}" {{ request('metric_name') == $name ? 'selected' : '' }}>
                                    {{ ucwords(str_replace('_', ' ', $name)) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-pmc-navy text-white px-4 py-2 rounded-lg">Filter</button>
                        <a href="{{ route('admin.kpis.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Clear</a>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Client</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Metric</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Value</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Period</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($kpis as $kpi)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $kpi->client->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ ucwords(str_replace('_', ' ', $kpi->metric_name)) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($kpi->unit === 'USD')
                                                ${{ number_format($kpi->value, 2) }}
                                            @elseif($kpi->unit === 'percentage')
                                                {{ number_format($kpi->value, 1) }}%
                                            @else
                                                {{ number_format($kpi->value, 2) }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $kpi->period }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $kpi->period_date->format('M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                            <a href="{{ route('admin.kpis.edit', $kpi) }}" class="text-pmc-teal hover:underline">Edit</a>
                                            <form method="POST" action="{{ route('admin.kpis.destroy', $kpi) }}" onsubmit="return confirm('Delete this KPI?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No KPI metrics found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $kpis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
