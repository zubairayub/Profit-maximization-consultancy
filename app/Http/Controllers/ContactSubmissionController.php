<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\User;
use App\Notifications\NewContactSubmissionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'interest' => ['required', 'string', 'max:32'],
            'company_size' => ['required', 'string', 'max:32'],
            'name' => ['required', 'string', 'max:120'],
            'title' => ['required', 'string', 'max:120'],
            'company' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:60'],
            'challenge' => ['required', 'string', 'max:4000'],
        ]);

        $submission = ContactSubmission::create($validated + ['status' => 'new']);

        // Notify all admin users
        $admins = User::role(['admin', 'editor'])->get();
        if ($admins->isNotEmpty()) {
            Notification::send($admins, new NewContactSubmissionNotification($submission));
        }

        return redirect()
            ->route('contact')
            ->with('status', 'Request received. If we believe we can deliver a 5–10x return on fees, we will respond discreetly.');
    }
}
