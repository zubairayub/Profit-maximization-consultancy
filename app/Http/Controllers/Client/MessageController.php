<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ClientMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $client = $user->clients()->first();

        abort_unless($client, 403, 'No client is assigned to this account.');

        $messages = ClientMessage::query()
            ->where('client_id', $client->id)
            ->where('visibility', 'client')
            ->latest()
            ->paginate(25);

        return view('client.messages.index', [
            'client' => $client,
            'messages' => $messages,
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $client = $user->clients()->first();

        abort_unless($client, 403, 'No client is assigned to this account.');

        $validated = $request->validate([
            'body' => ['required', 'string', 'max:4000'],
        ]);

        ClientMessage::create([
            'client_id' => $client->id,
            'user_id' => $user->id,
            'body' => $validated['body'],
            'visibility' => 'client',
        ]);

        return redirect()->route('client.messages.index')->with('status', 'Message sent.');
    }
}
