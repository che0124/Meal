<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SurpriseController extends Controller
{
    public function surprise()
    {
        return view('surprise', ['posts' => Post::cursor()]);
    }
}