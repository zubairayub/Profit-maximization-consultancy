<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Contact Submissions Analytics
        $totalSubmissions = ContactSubmission::count();
        $newSubmissions = ContactSubmission::where('status', 'new')->count();
        $contactedSubmissions = ContactSubmission::where('status', 'contacted')->count();
        $qualifiedSubmissions = ContactSubmission::where('status', 'qualified')->count();
        $convertedSubmissions = ContactSubmission::where('status', 'converted')->count();
        
        $recentSubmissions = ContactSubmission::latest()->take(5)->get();
        
        // Package interest breakdown
        $packageBreakdown = ContactSubmission::select('interest', DB::raw('count(*) as count'))
            ->groupBy('interest')
            ->get()
            ->pluck('count', 'interest')
            ->toArray();
        
        // Company size breakdown
        $companySizeBreakdown = ContactSubmission::select('company_size', DB::raw('count(*) as count'))
            ->groupBy('company_size')
            ->get()
            ->pluck('count', 'company_size')
            ->toArray();
        
        // Status breakdown
        $statusBreakdown = ContactSubmission::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status')
            ->toArray();
        
        // Other metrics
        $totalClients = Client::count();
        $activeClients = Client::where('status', 'active')->count();
        $totalInvoices = Invoice::count();
        $totalRevenue = Invoice::sum('amount');
        $totalUsers = User::count();
        $totalDocuments = Document::count();
        
        // Conversion rates
        $conversionRate = $totalSubmissions > 0 
            ? round(($convertedSubmissions / $totalSubmissions) * 100, 1) 
            : 0;
        
        $qualificationRate = $totalSubmissions > 0 
            ? round(($qualifiedSubmissions / $totalSubmissions) * 100, 1) 
            : 0;

        return view('admin.dashboard', compact(
            'totalSubmissions',
            'newSubmissions',
            'contactedSubmissions',
            'qualifiedSubmissions',
            'convertedSubmissions',
            'recentSubmissions',
            'packageBreakdown',
            'companySizeBreakdown',
            'statusBreakdown',
            'totalClients',
            'activeClients',
            'totalInvoices',
            'totalRevenue',
            'totalUsers',
            'totalDocuments',
            'conversionRate',
            'qualificationRate'
        ));
    }
}
