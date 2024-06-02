<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\PostUser;
use Carbon\Carbon;


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
        $postCreates = Post::where('user_id', Auth::user()->id)
            ->orderBy('date', 'asc')->orderBy('time', 'asc')->get();
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
        //postJoins sort by date and time
        usort($postJoins, function ($a, $b) {
            $dateComparison = strcmp($a->date, $b->date);
            if ($dateComparison == 0) {
                return strcmp($a->time, $b->time);
            }
            return $dateComparison;
        });
        
        //user's avatar in the post and post running
        $posts = Post::all();
        $now = Carbon::now();
        $postRunnings = [];
        $avatars = [];
        foreach ($posts as $post) {
            //post running
            $postDatetime = Carbon::create($post->date.$post->time)->setTimezone('Asia/Taipei');
            if($postDatetime <= $now){
                $postRunnings[] = $post;
            }

            $postUsers = PostUser::where('post_id', $post->id)->get();
            foreach ($postUsers as $postUser) {
                $user = User::find($postUser->user_id);
                $avatars[$post->id][] = $user->profile->avatar;
            }
        }
        return view('home', [
            'posts' => $posts,
            'postRunnings' => $postRunnings,
            'postCreates' => $postCreates,
            'postJoins' => $postJoins,
            'avatars' => $avatars,
        ]);
    }
}
