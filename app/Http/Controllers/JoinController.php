<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class JoinController extends Controller
{
    public function join()
    {
        return view('posts.index', ['posts' => Post::cursor()]);
    }
}
