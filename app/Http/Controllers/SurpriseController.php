<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostUser;

use Illuminate\Support\Facades\Auth;

class SurpriseController extends Controller
{
    public function surprise()
    {
        $user = Auth::user();
        $postIdsUserParticipated = PostUser::where('user_id', $user->id)->pluck('post_id')->toArray();
        $randomPost = PostUser::whereNotIn('post_id', $postIdsUserParticipated)
            ->inRandomOrder()
            ->first();
        if ($randomPost) {
            $randomPost = $randomPost->post;
        } else {
            $randomPost = null;
        }
        
        return view('surprise', ['randomPost' => $randomPost]);
    }


    

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
        return view('surprise.show', $binding);
    }

}
