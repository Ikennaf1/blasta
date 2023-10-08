<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource to everyone.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
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
                ->orderBy('id', 'DESC')
                ->paginate($limit);
            $posts->withPath('/dashboard?route=posts/all');
            $subtitle = 'All Posts';
        }

        else if ($filter === 'published') {
            $posts = Post::where('post_type', 'post')
                ->where('status', 'published')
                ->latest()
                ->orderBy('id', 'DESC')
                ->paginate($limit);
            $posts->withPath('/dashboard?route=posts/all/published');
            $subtitle = 'Published Posts';
        }

        else if ($filter === 'drafts') {
            $posts = Post::where('post_type', 'post')
                ->where('status', 'draft')
                ->latest()
                ->orderBy('id', 'DESC')
                ->paginate($limit);
            $posts->withPath('/dashboard?route=posts/all/drafts');
            $subtitle = 'Drafts';
        }

        else if ($filter === 'trashed') {
            $posts = Post::where('post_type', 'post')
                ->onlyTrashed()
                ->latest()
                ->orderBy('id', 'DESC')
                ->paginate($limit);
            $posts->withPath('/dashboard?route=posts/all/trashed');
            $subtitle = 'Trashed Posts';
        }
        
        else {
            $posts = Post::where('post_type', 'post')
                ->latest()
                ->orderBy('id', 'DESC')
                ->paginate($limit);
            $posts->withPath('/dashboard?route=posts/all');
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
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = $this->saveDraft($request);

        if (!empty($request->publish)) {
            $post->status = 'published';
            $post->save();
        }

        return redirect('/dashboard?route=posts/edit/' . $post->id);
    }

    /**
     * Saves draft a newly created post in storage.
     */
    public function saveDraft(StorePostRequest $request)
    {
        $featured_image = null;

        if (!empty($request->featured_image)) {
            $featured_image = ImageController::upload($request, 'featured_image');
        }
        
        return Post::create([
            'title'             => $request->title,
            'content'           => $request->content,
            'featured_image'    => $featured_image,
            'user_id'           => Auth::id()
            // 'description'       => $request->description,
            // 'keywords'          => $request->keywords,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // return Post::find($post);
        $post->author = User::find($post->user_id)->name;
        return view('front.post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd($request->content);
        $featured_image = $post->featured_image;

        if (!empty($request->featured_image)) {
            $featured_image = ImageController::upload($request, 'featured_image');
        }
        
        $post->update([
            'title'             => $request->title,
            'content'           => $request->content,
            'featured_image'    => $featured_image
            // 'description'       => $request->description,
            // 'keywords'          => $request->keywords,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
