<?php

namespace App\Http\Controllers\Admin;

use App\Models\KpiMetric;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KpiMetricController extends Controller
{
    public function index(Request $request)
    {
        $query = KpiMetric::with('client')->latest('period_date');

        if ($request->filled('client_id')) {
            $query->where('client_id', $request->client_id);
        }

        if ($request->filled('metric_name')) {
            $query->where('metric_name', $request->metric_name);
        }

        $kpis = $query->paginate(20);
        $clients = Client::orderBy('name')->get();
        $metricNames = KpiMetric::distinct()->pluck('metric_name')->sort();

        return view('admin.kpis.index', compact('kpis', 'clients', 'metricNames'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('admin.kpis.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'metric_name' => 'required|string|max:255',
            'value' => 'required|numeric',
            'period' => 'required|in:monthly,quarterly,yearly',
            'period_date' => 'required|date',
            'unit' => 'nullable|string|max:10',
            'notes' => 'nullable|string',
        ]);

        KpiMetric::create($validated);

        return redirect()->route('admin.kpis.index')
            ->with('success', 'KPI metric created successfully.');
    }

    public function show(KpiMetric $kpi)
    {
        return view('admin.kpis.show', compact('kpi'));
    }

    public function edit(KpiMetric $kpi)
    {
        $clients = Client::orderBy('name')->get();
        return view('admin.kpis.edit', compact('kpi', 'clients'));
    }

    public function update(Request $request, KpiMetric $kpi)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'metric_name' => 'required|string|max:255',
            'value' => 'required|numeric',
            'period' => 'required|in:monthly,quarterly,yearly',
            'period_date' => 'required|date',
            'unit' => 'nullable|string|max:10',
            'notes' => 'nullable|string',
        ]);

        $kpi->update($validated);

        return redirect()->route('admin.kpis.index')
            ->with('success', 'KPI metric updated successfully.');
    }

    public function destroy(KpiMetric $kpi)
    {
        $kpi->delete();

        return redirect()->route('admin.kpis.index')
            ->with('success', 'KPI metric deleted successfully.');
    }
}
