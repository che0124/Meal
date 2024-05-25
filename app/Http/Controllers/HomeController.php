<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\PostUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Post $post)
    {
        $user = Auth::user();
        $posts = Post::all();

        $userPostIds = PostUser::where('user_id', $user->id)->pluck('post_id')->toArray();

        return view('home', [
            'posts' => $posts,
            'userPostIds' => $userPostIds
        ]);
    }
}