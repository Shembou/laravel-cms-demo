<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();

        return inertia('Page', [
            'page' => [
                'title' => $page->title,
                'description' => $page->description,
                'content' => $page->content,
            ],
            'currentRoute' => "/{$slug}",
        ]);
    }
}
