<?php

namespace App\Http\Controllers;
use App\Models\PostUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class SurpriseController extends Controller
{
    public function surprise()
    {
        return view('surprise', ['posts' => Post::cursor()]);

    }

    public function store(Request $request)
    {    
        
        $exist = PostUser::where('user_id', $request->user()->id)->where('post_id', (int)$request->post_id)->exists();
        
        $post_user = new PostUser;
        $post_user->post_id = (int)$request->post_id;
        $post_user->user_id = $request->user()->id;
        $post_user->save();
    
        
        return redirect()->route('post.show', ['post' => $request->post_id]);

        
        
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
