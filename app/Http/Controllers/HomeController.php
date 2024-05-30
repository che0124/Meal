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
            $postUsers = PostUser::where('post_id', $post->id)->get();
            foreach ($postUsers as $postUser) {
                $user = User::find($postUser->user_id);
                if ($user && $user->profile) {
                    if (!isset($avatars[$post->id])) {
                        $avatars[$post->id] = []; // 初始化为数组
                    }
                    $avatars[$post->id][] = $user->profile->avatar;
                }
            }
        }
        // dd($avatars);
        
        return view('home', [
            'posts' => $posts,
            'userPostIds' => $userPostIds,
            'avatars' => $avatars,
            'profiles' => User::cursor()
        ]);
    }
}
