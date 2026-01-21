<?php

use App\Http\Controllers\Admin\ContactSubmissionController as AdminContactSubmissionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\InvoiceController as AdminInvoiceController;
use App\Http\Controllers\Admin\KpiMetricController as AdminKpiMetricController;
use App\Http\Controllers\Admin\PageContentController as AdminPageContentController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Client\DocumentController as ClientDocumentController;
use App\Http\Controllers\Client\InvoiceController as ClientInvoiceController;
use App\Http\Controllers\Client\MessageController as ClientMessageController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('marketing.home');
})->name('home');

Route::view('/services', 'marketing.services')->name('services');
Route::view('/methodology', 'marketing.methodology')->name('methodology');
Route::view('/industries', 'marketing.industries')->name('industries');
Route::view('/about', 'marketing.about')->name('about');
Route::view('/about-us', 'marketing.about-us')->name('about-us');
Route::view('/faq', 'marketing.faq')->name('faq');
Route::view('/contact', 'marketing.contact')->name('contact');
Route::post('/contact', [ContactSubmissionController::class, 'store'])->name('contact.submit');

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user?->hasAnyRole(['admin', 'editor'])) {
        return redirect()->route('admin.dashboard');
    }

    if ($user?->hasRole('client')) {
        return redirect()->route('client.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('client')->middleware(['auth', 'role:client|admin'])->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('client.dashboard');
    Route::get('/reports', [ClientDocumentController::class, 'index'])->name('client.reports.index');
    Route::get('/reports/{document}', [ClientDocumentController::class, 'show'])->name('client.reports.show');
    Route::get('/invoices', [ClientInvoiceController::class, 'index'])->name('client.invoices.index');
    Route::get('/messages', [ClientMessageController::class, 'index'])->name('client.messages.index');
    Route::post('/messages', [ClientMessageController::class, 'store'])->name('client.messages.store');
});

Route::prefix('admin')->middleware(['auth', 'role:admin|editor'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('clients', AdminClientController::class)->names('admin.clients');
    Route::resource('documents', AdminDocumentController::class)->names('admin.documents');
    Route::resource('invoices', AdminInvoiceController::class)->names('admin.invoices');
    Route::resource('contacts', AdminContactSubmissionController::class)->names('admin.contacts')->only(['index', 'show', 'update', 'destroy']);
    Route::resource('pages', AdminPageContentController::class)->names('admin.pages')->only(['index', 'edit', 'update']);
    Route::resource('kpis', AdminKpiMetricController::class)->names('admin.kpis');
    Route::resource('users', AdminUserController::class)->names('admin.users');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
