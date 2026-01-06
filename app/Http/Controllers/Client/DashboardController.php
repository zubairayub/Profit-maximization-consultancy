<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\KpiMetric;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $client = $user->clients()->first();

        $kpiData = [];
        if ($client) {
            // Get last 12 months of KPI data grouped by metric
            $kpiData = KpiMetric::where('client_id', $client->id)
                ->where('period', 'monthly')
                ->where('period_date', '>=', now()->subMonths(12))
                ->orderBy('period_date')
                ->get()
                ->groupBy('metric_name')
                ->map(function ($metrics) {
                    return [
                        'labels' => $metrics->pluck('period_date')->map(fn($d) => $d->format('M Y'))->toArray(),
                        'values' => $metrics->pluck('value')->toArray(),
                    ];
                })
                ->toArray();

            // Get latest metrics for summary cards
            $latestMetrics = KpiMetric::where('client_id', $client->id)
                ->whereIn('metric_name', ['ebitda', 'revenue', 'profit_margin', 'cash_flow'])
                ->orderBy('period_date', 'desc')
                ->get()
                ->groupBy('metric_name')
                ->map(fn($m) => $m->first())
                ->toArray();
        }

        return view('client.dashboard', [
            'client' => $client,
            'kpiData' => $kpiData,
            'latestMetrics' => $latestMetrics ?? [],
        ]);
    }
}
