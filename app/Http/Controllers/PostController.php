<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource to everyone.
     */
    public function index()
    {
        return view('posts.index', ['posts' => Post::all()]);
    }

    /**
     * Display a listing of the resource in the dashboard.
     */
    public function all(Request $request)
    {
        $filter = $request->filter;
        $limit = 5;
        if (!isset($filter) || $filter === '') {
            $posts = Post::where('post_type', 'post')
                ->latest()
                ->paginate($limit);
            // $posts = Post::withTrashed()->get();
            $subtitle = 'All Posts';
        }
        else if ($filter === 'published') {
            $posts = Post::where('post_type', 'post')
                ->where('status', 'published')
                ->paginate($limit);
            $subtitle = 'Published Posts';
        }
        else if ($filter === 'draft') {
            $posts = Post::where('post_type', 'post')
                ->where('status', 'draft')
                ->paginate($limit);
            $subtitle = 'Drafts';
        }
        else if ($filter === 'trashed') {
            $posts = Post::where('post_type', 'post')
                ->onlyTrashed()
                ->paginate($limit);
            $subtitle = 'Trashed Posts';
        } else {
            $posts = Post::where('post_type', 'post')->paginate($limit);
            $subtitle = 'All Posts';
        }
        return view('dashboard.posts.index', [
            'posts' => $posts,
            'subtitle' => $subtitle
        ]);
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
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Post::find($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
