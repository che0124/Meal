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
        //user create post
        $postCreates = Post::where('user_id', Auth::user()->id)->get();
        $postCreateIds = $postCreates->pluck('id')->toArray();

        //user join post
        $userJoinIds = PostUser::where('user_id', Auth::user()->id)->get();
        $postJoins = [];
        foreach ($userJoinIds as $userJoinId) {
            //except user create post
            if (!in_array($userJoinId->post_id, $postCreateIds)) {
                $postJoins[] = $userJoinId->post;
            }
        }

        //user's avatar in the post
        $posts = Post::all();
        $avatars = [];
        foreach ($posts as $post) {
            $postUsers = PostUser::where('post_id', $post->id)->get();
            foreach ($postUsers as $postUser) {
                $user = User::find($postUser->user_id);
                $avatars[$post->id][] = $user->profile->avatar;
            }
        }
        return view('home', [
            'posts' => $posts,
            'postCreates' => $postCreates,
            'postJoins' => $postJoins,
            'avatars' => $avatars,
        ]);
    }
}
