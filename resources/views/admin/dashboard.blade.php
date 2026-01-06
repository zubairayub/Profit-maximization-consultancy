<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Analytics Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Key Metrics Cards -->
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-gradient-to-br from-pmc-navy to-pmc-teal rounded-lg p-6 text-white">
                    <div class="text-sm opacity-80">Total Submissions</div>
                    <div class="text-3xl font-bold mt-1">{{ number_format($totalSubmissions) }}</div>
                </div>
                <div class="bg-gradient-to-br from-pmc-teal to-pmc-emerald rounded-lg p-6 text-white">
                    <div class="text-sm opacity-80">Active Clients</div>
                    <div class="text-3xl font-bold mt-1">{{ number_format($activeClients) }}</div>
                </div>
                <div class="bg-gradient-to-br from-pmc-emerald to-pmc-teal rounded-lg p-6 text-white">
                    <div class="text-sm opacity-80">Total Revenue</div>
                    <div class="text-3xl font-bold mt-1">${{ number_format($totalRevenue, 0) }}</div>
                </div>
                <div class="bg-gradient-to-br from-pmc-navy to-pmc-emerald rounded-lg p-6 text-white">
                    <div class="text-sm opacity-80">Conversion Rate</div>
                    <div class="text-3xl font-bold mt-1">{{ $conversionRate }}%</div>
                </div>
            </div>

            <!-- Conversion Funnel -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Conversion Funnel</h3>
                    <div class="space-y-4">
                        @php
                            $funnelSteps = [
                                ['label' => 'New Submissions', 'count' => $newSubmissions, 'color' => 'bg-blue-500'],
                                ['label' => 'Contacted', 'count' => $contactedSubmissions, 'color' => 'bg-yellow-500'],
                                ['label' => 'Qualified', 'count' => $qualifiedSubmissions, 'color' => 'bg-orange-500'],
                                ['label' => 'Converted', 'count' => $convertedSubmissions, 'color' => 'bg-green-500'],
                            ];
                            $counts = array_column($funnelSteps, 'count');
                            $maxCount = !empty($counts) ? max($counts) : 1;
                            if ($maxCount == 0) $maxCount = 1;
                        @endphp
                        @foreach($funnelSteps as $step)
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">{{ $step['label'] }}</span>
                                    <span class="text-sm">{{ $step['count'] }} ({{ $totalSubmissions > 0 ? round(($step['count'] / $totalSubmissions) * 100, 1) : 0 }}%)</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="{{ $step['color'] }} h-4 rounded-full" style="width: {{ ($step['count'] / $maxCount) * 100 }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <!-- Package Interest Breakdown -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Package Interest</h3>
                        <div class="space-y-2">
                            @forelse($packageBreakdown as $package => $count)
                                <div class="flex justify-between items-center">
                                    <span class="capitalize">{{ str_replace('_', ' ', $package) }}</span>
                                    <div class="flex items-center gap-2">
                                        <div class="w-32 bg-gray-200 rounded-full h-2">
                                            <div class="bg-pmc-teal h-2 rounded-full" style="width: {{ $totalSubmissions > 0 ? ($count / $totalSubmissions) * 100 : 0 }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium w-8 text-right">{{ $count }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-sm text-gray-500 dark:text-gray-400 text-center py-4">No package interest data yet.</div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Company Size Breakdown -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Company Size</h3>
                        <div class="space-y-2">
                            @forelse($companySizeBreakdown as $size => $count)
                                <div class="flex justify-between items-center">
                                    <span>{{ $size }}</span>
                                    <div class="flex items-center gap-2">
                                        <div class="w-32 bg-gray-200 rounded-full h-2">
                                            <div class="bg-pmc-emerald h-2 rounded-full" style="width: {{ $totalSubmissions > 0 ? ($count / $totalSubmissions) * 100 : 0 }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium w-8 text-right">{{ $count }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-sm text-gray-500 dark:text-gray-400 text-center py-4">No company size data yet.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Submissions -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Recent Submissions</h3>
                        <a href="{{ route('admin.contacts.index') }}" class="text-pmc-teal hover:underline text-sm">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Company</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Contact</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Interest</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($recentSubmissions as $submission)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $submission->company }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $submission->name }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap capitalize">{{ str_replace('_', ' ', $submission->interest) }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full 
                                                @if($submission->status == 'new') bg-blue-100 text-blue-800
                                                @elseif($submission->status == 'contacted') bg-yellow-100 text-yellow-800
                                                @elseif($submission->status == 'qualified') bg-orange-100 text-orange-800
                                                @elseif($submission->status == 'converted') bg-green-100 text-green-800
                                                @else bg-gray-100 text-gray-800
                                                @endif">
                                                {{ ucfirst($submission->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm">{{ $submission->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-3 text-center text-gray-500">No submissions yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ([
                            ['Users', 'admin.users.index', 'Create users, assign roles, assign clients.'],
                            ['Clients', 'admin.clients.index', 'Companies, packages, portal access.'],
                            ['Documents', 'admin.documents.index', 'Upload reports into specific client vaults.'],
                            ['Invoices', 'admin.invoices.index', 'Retainers, 50% advances, success fee tracking.'],
                            ['KPI Metrics', 'admin.kpis.index', 'Manage KPI data for client dashboards.'],
                            ['Contact Submissions', 'admin.contacts.index', 'Strategic dialogue inquiries and follow-ups.'],
                            ['Page Content', 'admin.pages.index', 'Edit key page content (WYSIWYG + JSON).'],
                        ] as [$title, $route, $desc])
                            <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 hover:border-pmc-teal transition">
                                <a class="font-semibold hover:underline text-pmc-teal" href="{{ route($route) }}">{{ $title }}</a>
                                <div class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ $desc }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
