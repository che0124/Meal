<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\PostUser;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all();

        $userPostIds = PostUser::where('user_id', $user->id)->pluck('post_id')->toArray();

        return view('posts.index', [
            'posts' => $posts,
            'userPostIds' => $userPostIds
        ]);
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
        $post->title = $request->input('title');
        $post->restaurant = $request->input('restaurant');
        $post->time = $request->input('time');
        $post->content = $request->input('content');
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect(route('posts.show', ['post' => $post]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $exist = PostUser::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists();

        return view('posts.show', ['post' => $post, 'exist' => $exist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
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

        return redirect(route('posts.show', ['post' => $post]));
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
