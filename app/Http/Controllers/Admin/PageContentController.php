<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageContent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ensure the core pages exist
        foreach (['home', 'services', 'methodology', 'industries', 'about', 'contact'] as $key) {
            PageContent::firstOrCreate(['key' => $key], ['title' => ucfirst($key), 'content' => []]);
        }

        $pages = PageContent::query()->orderBy('key')->get();

        return view('admin.pages.index', [
            'pages' => $pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PageContent $page)
    {
        return view('admin.pages.edit', [
            'page' => $page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PageContent $page)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:190'],
            'content_json' => ['nullable', 'string', 'max:20000'],
            'body_html' => ['nullable', 'string', 'max:20000'],
        ]);

        $content = $page->content ?? [];
        if (! empty($validated['content_json'])) {
            $decoded = json_decode($validated['content_json'], true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return back()->withErrors(['content_json' => 'Invalid JSON.']);
            }
            $content = $decoded;
        }

        if (array_key_exists('body_html', $validated) && $validated['body_html'] !== null) {
            $content['body_html'] = $validated['body_html'];
        }

        $page->update([
            'title' => $validated['title'] ?? $page->title,
            'content' => $content,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.pages.edit', $page)->with('status', 'Page content saved.');
    }
}
