<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SurpriseController extends Controller
{
    public function surprise()
    {
        $post = Post::inRandomOrder()->first();

    
        return view('surprise', ['post' => $post]);
        
    }
}
