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
    public function update(Request $request)
{
    // 验证用户输入
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // 更新用户数据
    $user = Auth::user();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->save();

    // 重定向回 profile 页面
    return redirect()->route('{name}', ['name' => $user->name ?? 'None']);
}

}