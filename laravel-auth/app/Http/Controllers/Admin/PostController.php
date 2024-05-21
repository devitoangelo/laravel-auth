<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.posts.index', ['posts' => Post::orderByDesc('id')->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()


    {

        
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();
        // dd($validated);
        $slug = Str::slug($request->title, '-');
        $validated['slug'] = $slug;
        // dd($validated);
        Post::create($validated);
        return to_route('admin.posts.index')->with('message', 'Post created successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $validated = $request->validated();
        $slug = Str::slug($request->title, '-');
        $validated['slug'] = $slug;
        // dd($validated);
        $post->update($validated);
        return to_route('admin.posts.index')->with('message', "Post $post->title update successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index')->with('message', "Post $post->title deleted successfully");
    }
}
