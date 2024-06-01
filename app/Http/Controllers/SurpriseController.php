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
}
