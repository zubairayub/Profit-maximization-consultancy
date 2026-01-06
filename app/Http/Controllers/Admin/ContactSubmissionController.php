<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactSubmission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactSubmission::query()->latest()->paginate(30);

        return view('admin.contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(ContactSubmission $contact)
    {
        return view('admin.contacts.show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactSubmission $contact)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'max:32'],
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.show', $contact)->with('status', 'Status updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactSubmission $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('status', 'Submission deleted.');
    }
}
