<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::query()->latest()->paginate(20);

        return view('admin.clients.index', [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientUsers = User::query()
            ->when(method_exists(User::class, 'role'), fn ($q) => $q)
            ->get();

        return view('admin.clients.create', [
            'clientUsers' => $clientUsers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:190'],
            'legal_name' => ['nullable', 'string', 'max:190'],
            'slug' => ['nullable', 'string', 'max:190'],
            'industry' => ['nullable', 'string', 'max:120'],
            'revenue_band' => ['nullable', 'string', 'max:64'],
            'package_tier' => ['nullable', 'string', 'max:32'],
            'status' => ['required', 'string', 'max:32'],
            'primary_user_id' => ['nullable', 'integer', 'exists:users,id'],
            'notes' => ['nullable', 'string', 'max:4000'],
        ]);

        $slug = $validated['slug'] ?: Str::slug($validated['name']);
        $base = $slug;
        $i = 1;
        while (Client::where('slug', $slug)->exists()) {
            $i++;
            $slug = $base.'-'.$i;
        }

        $client = Client::create(array_merge($validated, ['slug' => $slug]));

        if (! empty($validated['primary_user_id'])) {
            $client->users()->syncWithoutDetaching([
                $validated['primary_user_id'] => ['relationship' => 'primary'],
            ]);
        }

        return redirect()->route('admin.clients.index')->with('status', 'Client created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return redirect()->route('admin.clients.edit', $client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $clientUsers = User::query()->get();

        return view('admin.clients.edit', [
            'client' => $client,
            'clientUsers' => $clientUsers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:190'],
            'legal_name' => ['nullable', 'string', 'max:190'],
            'slug' => ['required', 'string', 'max:190', 'unique:clients,slug,'.$client->id],
            'industry' => ['nullable', 'string', 'max:120'],
            'revenue_band' => ['nullable', 'string', 'max:64'],
            'package_tier' => ['nullable', 'string', 'max:32'],
            'status' => ['required', 'string', 'max:32'],
            'primary_user_id' => ['nullable', 'integer', 'exists:users,id'],
            'notes' => ['nullable', 'string', 'max:4000'],
        ]);

        $client->update($validated);

        if (! empty($validated['primary_user_id'])) {
            $client->users()->syncWithoutDetaching([
                $validated['primary_user_id'] => ['relationship' => 'primary'],
            ]);
        }

        return redirect()->route('admin.clients.edit', $client)->with('status', 'Client updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')->with('status', 'Client deleted.');
    }
}
