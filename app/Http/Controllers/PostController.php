<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('resources.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resources.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Post::create([
            'subject' => $request->subject,
            'post' => $request->post,
            'status' => (is_null($request->status) ? 0 : 1)
        ]);
        return redirect()->route('post.index')->with('message', 'New Post Successfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('resources.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('resources.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'subject' => $request->subject,
            'post' => $request->post,
            'status' => (is_null($request->status) ? 0 : 1)
        ]);
        return redirect()->route('post.index')->with('message', 'Post Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Post Successfully Deleted!');
    }
}