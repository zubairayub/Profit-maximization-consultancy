<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::query()->with('client')->latest()->paginate(20);

        return view('admin.documents.index', [
            'documents' => $documents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::query()->orderBy('name')->get();

        return view('admin.documents.create', [
            'clients' => $clients,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => ['required', 'integer', 'exists:clients,id'],
            'title' => ['required', 'string', 'max:190'],
            'category' => ['required', 'string', 'max:32'],
            'period_start' => ['nullable', 'date'],
            'period_end' => ['nullable', 'date'],
            'is_visible_to_client' => ['nullable', 'boolean'],
            'file' => ['required', 'file', 'mimes:pdf', 'max:20480'], // 20MB
        ]);

        $file = $request->file('file');
        $path = $file->storeAs(
            'clients/'.$validated['client_id'].'/reports',
            now()->format('YmdHis').'-'.preg_replace('/[^A-Za-z0-9._-]/', '-', $file->getClientOriginalName()),
            'public'
        );

        Document::create([
            'client_id' => $validated['client_id'],
            'uploaded_by' => Auth::id(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'period_start' => $validated['period_start'] ?? null,
            'period_end' => $validated['period_end'] ?? null,
            'file_path' => $path,
            'mime_type' => $file->getClientMimeType(),
            'size_bytes' => $file->getSize(),
            'is_visible_to_client' => (bool)($validated['is_visible_to_client'] ?? true),
        ]);

        return redirect()->route('admin.documents.index')->with('status', 'Document uploaded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return Storage::disk('public')->download($document->file_path, basename($document->file_path));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $clients = Client::query()->orderBy('name')->get();

        return view('admin.documents.edit', [
            'document' => $document,
            'clients' => $clients,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'client_id' => ['required', 'integer', 'exists:clients,id'],
            'title' => ['required', 'string', 'max:190'],
            'category' => ['required', 'string', 'max:32'],
            'period_start' => ['nullable', 'date'],
            'period_end' => ['nullable', 'date'],
            'is_visible_to_client' => ['nullable', 'boolean'],
        ]);

        $document->update([
            'client_id' => $validated['client_id'],
            'title' => $validated['title'],
            'category' => $validated['category'],
            'period_start' => $validated['period_start'] ?? null,
            'period_end' => $validated['period_end'] ?? null,
            'is_visible_to_client' => (bool)($validated['is_visible_to_client'] ?? false),
        ]);

        return redirect()->route('admin.documents.edit', $document)->with('status', 'Document updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('admin.documents.index')->with('status', 'Document deleted.');
    }
}
