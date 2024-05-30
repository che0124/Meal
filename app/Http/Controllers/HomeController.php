<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all();
        $userPostIds = PostUser::where('user_id', $user->id)->pluck('post_id')->toArray();

        $avatars = [];
        foreach ($posts as $post) {
            $post_user = PostUser::where('post_id', $post->id)->get();
            foreach ($post_user as $postUser) {
                $user = User::find($postUser->user_id);
                $avatars[] = $user->profile->avatar;
            }
        }

        return view('home', [
            'posts' => $posts,
            'userPostIds' => $userPostIds,
            'avatars' => $avatars,
            'profiles' => User::cursor()
        ]);
    }
}
