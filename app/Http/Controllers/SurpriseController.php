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

        $singlePostIds = PostUser::select('post_id')
            ->groupBy('post_id')
            ->havingRaw('COUNT(*) = 1')
            ->pluck('post_id');
        $postUsers = PostUser::whereNot('user_id', $user->id)
            ->whereIn('post_id', $singlePostIds)
            ->get();

        if ($postUsers->count() > 0) {
            $randomPostUser = $postUsers->random();
            $randomPost = $randomPostUser->post;
        } else {
            $randomPost = (object) [
                'restaurant' => 'No restaurants found',
                'date' => '',
                'time' => ''
            ];
        }
        return view('surprise', ['postUsers' => $postUsers, 'randomPost'=>$randomPost]);
    }
}
