<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Client Portal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-lg font-semibold">Welcome</div>
                    @if ($client)
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            Client: <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $client->name }}</span>
                        </p>
                    @else
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            No client is assigned to this account yet. Please contact your administrator.
                        </p>
                    @endif

                    @if (session('status'))
                        <div class="mt-4 rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-3 text-sm">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ([
                            ['Report Vault', 'client.reports.index', 'Secure PDFs for monthly/quarterly reports.'],
                            ['Invoices & Payments', 'client.invoices.index', 'Retainer status, 50% advance tracking, success fee ledger.'],
                            ['Message Board', 'client.messages.index', 'Confidential communication with your consulting team.'],
                        ] as [$title, $route, $desc])
                            <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4">
                                <a class="font-semibold hover:underline" href="{{ route($route) }}">{{ $title }}</a>
                                <div class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ $desc }}</div>
                            </div>
                        @endforeach
                    </div>

                    @if ($client && !empty($kpiData))
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-4">KPI Dashboard</h3>
                            <div class="grid gap-6 md:grid-cols-2">
                                @foreach ($kpiData as $metricName => $data)
                                    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                                        <h4 class="font-semibold mb-3 capitalize">{{ str_replace('_', ' ', $metricName) }}</h4>
                                        <canvas id="chart-{{ $metricName }}" height="200"></canvas>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($client && !empty($latestMetrics))
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-4">Latest Metrics</h3>
                            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                                @foreach ($latestMetrics as $metricName => $metric)
                                    <div class="bg-gradient-to-br from-pmc-navy to-pmc-teal rounded-lg p-4 text-white">
                                        <div class="text-sm opacity-80 capitalize">{{ str_replace('_', ' ', $metricName) }}</div>
                                        <div class="text-2xl font-bold mt-1">
                                            @if ($metric->unit === 'USD')
                                                ${{ number_format($metric->value, 0) }}
                                            @elseif ($metric->unit === 'percentage')
                                                {{ number_format($metric->value, 1) }}%
                                            @else
                                                {{ number_format($metric->value, 0) }}
                                            @endif
                                        </div>
                                        <div class="text-xs opacity-70 mt-1">{{ $metric->period_date->format('M Y') }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($client && !empty($kpiData))
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const kpiData = @json($kpiData);
                    
                    Object.keys(kpiData).forEach(metricName => {
                        const data = kpiData[metricName];
                        const ctx = document.getElementById('chart-' + metricName);
                        if (ctx) {
                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: data.labels,
                                    datasets: [{
                                        label: metricName.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase()),
                                        data: data.values,
                                        borderColor: '#0d9488',
                                        backgroundColor: 'rgba(13, 148, 136, 0.1)',
                                        tension: 0.4,
                                        fill: true,
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            display: false
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: false,
                                            ticks: {
                                                callback: function(value) {
                                                    return '$' + value.toLocaleString();
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    });
                });
            </script>
        @endpush
    @endif
</x-app-layout>

