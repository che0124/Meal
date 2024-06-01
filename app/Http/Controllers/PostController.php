<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\PostUser;
use Carbon\Carbon;

use App\Notifications\MealReminder;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all();

        $userPostIds = PostUser::where('user_id', $user->id)->pluck('post_id')->toArray();

        return view('posts.index', [
            'posts' => $posts,
            'userPostIds' => $userPostIds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null(Auth::user())) {
            return redirect(route('login'));
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->restaurant = $request->input('restaurant');
        $post->date = $request->input('date');
        $post->time = $request->input('time');
        $post->content = $request->input('content');
        $post->user_id = $request->user()->id;
        $post->save();

        $post_user = new PostUser;
        $post_user->post_id = $post->id;
        $post_user->user_id = $post->user->id;
        $post_user->save();

        // $user = User::find(Auth::user()->id);
        // $post = Post::find($post->id);
        // $user->notify(new MealReminder($post));

        return redirect(route('posts.show', ['post' => $post]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $exist = PostUser::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists();
        $post_users = PostUser::where('post_id', $post->id)->get();

        $avatars = [];
        foreach ($post_users as $postUser) {
            $user = User::find($postUser->user_id);
            $avatars[] = $user->profile->avatar;
        }
        return view('posts.show', ['post' => $post, 'exist' => $exist, 'avatars' => $avatars]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->restaurant = $request->input('restaurant');
        $post->time = $request->input('time');
        $post->date = $request->input('date');
        $post->content = $request->input('content');
        $post->save();

        return redirect(route('posts.show', ['post' => $post]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('posts.index'));
    }

    public function notifyUsersBeforeEvent()
    {
        // 获取当前时间并加上一小时
        $now = Carbon::now();
        $oneHourFromNow = $now->copy()->addHour();


        $currentDate = $now->toDateString();
        $currentTime = $now->toTimeString();
        $oneHourFromNowDate = $oneHourFromNow->toDateString();
        $oneHourFromNowTime = $oneHourFromNow->toTimeString();

        $eventsToday = Post::where('date', $currentDate)
            ->whereBetween('time', [$currentTime, '23:59:59'])
            ->get();

        $eventsNextDay = Post::where('date', $oneHourFromNowDate)
            ->whereBetween('time', ['00:00:00', $oneHourFromNowTime])
            ->get();

        $posts = $eventsToday->merge($eventsNextDay);
        
        foreach ($posts as $post) {
            $post_users = PostUser::where('post_id', $post->id)->get();
            foreach ($post_users as $post_user) {
                $user = User::find($post_user->user_id);
                $user->notify(new MealReminder($post));
            }
        }

        return redirect()->back();
    }
}
