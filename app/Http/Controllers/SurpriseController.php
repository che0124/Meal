<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class SurpriseController extends Controller
{
    public function surprise()
    {
        $user = Auth::user();
        

        return view('surprise', ['posts' => Post::cursor()]);
    }
}
