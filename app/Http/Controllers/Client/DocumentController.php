<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $client = $user->clients()->first();

        abort_unless($client, 403, 'No client is assigned to this account.');

        $documents = Document::query()
            ->where('client_id', $client->id)
            ->where('is_visible_to_client', true)
            ->latest()
            ->paginate(20);

        return view('client.reports.index', [
            'client' => $client,
            'documents' => $documents,
        ]);
    }

    public function show(Document $document)
    {
        $user = Auth::user();
        $clientIds = $user->clients()->pluck('clients.id')->all();

        abort_unless(in_array($document->client_id, $clientIds, true), 403);
        abort_unless($document->is_visible_to_client || $user->hasAnyRole(['admin', 'editor']), 403);

        return Storage::disk('public')->download($document->file_path, basename($document->file_path));
    }
}
