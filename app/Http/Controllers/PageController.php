<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Returns a list of all pages
     */
    public function list()
    {
        $pagesFinal = [];
        $ignoredRoutes = [
            'pages/list'
        ];

        $pages = Post::where('post_type', 'page')
            ->where('status', 'published')
            ->get();
        $routes = Route::getRoutes();

        foreach ($pages as $page) {
            $pagesFinal[] = [
                'title' => $page->title,
                'link'  => $page->link ?? titleToLink($page->title)
            ];
        }
        
        foreach ($routes as $route) {
            $link = $route->uri();
            if (strpos($route->uri(), 'pages/') !== false) {
                if (in_array($route->uri(), $ignoredRoutes)) {
                    continue;
                }

                $pagesFinal = [...$pagesFinal, [
                    'title' => linkToTitle($link),
                    'link'  => $link
                    ]
                ];
            }
        }
        return $pagesFinal;
    }

    /**
     * Returns a list of all published pages
     */
    public function listPublished()
    {
        $pages = Post::where('post_type', 'page')
            ->where('status', 'published')
            ->get();
        
        return $pages;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = url()->current();
        $query = explode('/', $query);
        $queryString = $query[count($query) - 1];

        if ($queryString != (int) $queryString) {
            $post = Post::where('link', $queryString)
                ->where('post_type', 'page')
                ->firstOrFail();
        } else {
            $post = Post::where('id', (int) $queryString)
                ->where('post_type', 'page')
                ->firstOrFail();
        }

        $post->author = User::find($post->user_id)->name;

        return view('front.page', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }
}
