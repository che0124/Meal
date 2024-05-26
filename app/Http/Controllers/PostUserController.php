<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PostUser;
use App\Models\Post;
use Brick\Math\BigInteger;

class PostUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $post_users = PostUser::where('user_id', $user->id)->get();
        $postIds = $post_users->pluck('post_id');
        $posts = Post::whereIn('id', $postIds)->get();
        $binding = [
            'posts'=>$posts,        
            'user'=>$user
        ];
        return view('post_user.index', $binding);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $exist = PostUser::where('user_id', $request->user()->id)->where('post_id', (int)$request->post_id)->exists();
        if ($exist) {
            return redirect()->back();
        }
        
        $post_user = new PostUser;
        $post_user->post_id = (int)$request->post_id;
        $post_user->user_id = $request->user()->id;
        $post_user->save();
        $binding = [
            'post_user'=>$post_user,
        ];
        
        return redirect(route('post_user.show', $binding));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $post_users = PostUser::where('user_id', $user->id)->get();
        $postIds = $post_users->pluck('post_id');
        $posts = Post::whereIn('id', $postIds)->get();
        $binding = [
            'posts'=>$posts,        
            'user'=>$user,
        ];
        return view('post_user.show', $binding);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
