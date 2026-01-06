<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit KPI Metric
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.kpis.update', $kpi) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Client</label>
                            <select name="client_id" required class="mt-1 block w-full rounded-lg border-gray-300">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ $kpi->client_id == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Metric Name</label>
                            <input type="text" name="metric_name" required value="{{ old('metric_name', $kpi->metric_name) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Value</label>
                            <input type="number" step="0.01" name="value" required value="{{ old('value', $kpi->value) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Period</label>
                            <select name="period" required class="mt-1 block w-full rounded-lg border-gray-300">
                                <option value="monthly" {{ $kpi->period == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="quarterly" {{ $kpi->period == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                                <option value="yearly" {{ $kpi->period == 'yearly' ? 'selected' : '' }}>Yearly</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Period Date</label>
                            <input type="date" name="period_date" required value="{{ old('period_date', $kpi->period_date->format('Y-m-d')) }}" 
                                class="mt-1 block w-full rounded-lg border-gray-300">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Unit</label>
                            <select name="unit" class="mt-1 block w-full rounded-lg border-gray-300">
                                <option value="USD" {{ $kpi->unit == 'USD' ? 'selected' : '' }}>USD</option>
                                <option value="percentage" {{ $kpi->unit == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                <option value="count" {{ $kpi->unit == 'count' ? 'selected' : '' }}>Count</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                            <textarea name="notes" rows="3" class="mt-1 block w-full rounded-lg border-gray-300">{{ old('notes', $kpi->notes) }}</textarea>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="bg-pmc-teal hover:bg-pmc-emerald text-white px-6 py-2 rounded-lg">
                                Update KPI Metric
                            </button>
                            <a href="{{ route('admin.kpis.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
