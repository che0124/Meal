<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    public function show()
    {
        $user = Auth::user();
        return view('profile', ['user'=>$user]);
    }

}