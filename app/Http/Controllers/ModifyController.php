<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ModifyController extends Controller
{
    public function modify($user)
    {
        return view('modify', ['user' => $user]);
    }
}