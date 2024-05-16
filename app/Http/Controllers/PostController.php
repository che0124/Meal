<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', ['posts' => Post::cursor()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null(Auth::user())) {
            return redirect(route('login'));
        }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->restaurant = $request->input('restaurant');
        $post->time = $request->input('time');
        $post->content = $request->input('content');
        $post->user_id = 1;
        $post->save();
        return redirect(route('posts.show', ['post'=>$post]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.index', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->restaurant = $request->input('restaurant');
        $post->time = $request->input('time');
        $post->content = $request->input('content');
        $post->save();
        return redirect(route('posts.show', ['post'=>$post]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('posts.index'));
    }
}
