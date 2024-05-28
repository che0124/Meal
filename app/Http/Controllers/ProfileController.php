<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Avatar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profiles.index', ['users' => User::cursor()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->username = $request->input('username');
        $profile->gender = $request->input('gender');
        $profile->birthday = $request->input('birthday');
        $profile->bio = $request->input('bio');
        $profile->profile_picture = $request->file('image');
        $profile->save();



        return redirect(route('profiles.show', ['profile' => $profile]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $user = $profile;

        return view('profiles.show', ['profile' => $profile, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        $user = Auth::user();
        $avatar = $profile->avatar;
        return view('profiles.edit', ['profile' => $profile, 'user' => $user, 'avatar' => $avatar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->username = $request->input('username');
        $profile->gender = $request->input('gender');
        $profile->birthday = $request->input('birthday');
        $profile->bio = $request->input('bio');
        $profile->save();

        return redirect(route('profiles.show', ['profile' => $profile]));
    }

    public function avatar(Request $request)
    {
        $imagePath = time();
        $request->avatar->move(storage_path('app/public'), $imagePath);
        $profile = Auth::user()->profile;
        $avatar = $profile->avatar;
        $avatar->image = $imagePath;
        $avatar->save();

        return redirect()->route('profiles.show', ['profile' => $profile]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;

// class ProfileController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         return view('profiles.index', ['users' => User::all()]);
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }
//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show($id)
//     {
//         $user = User::findOrFail($id);
//         return view('profiles.show', ['user' => $user]);
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit($id)
//     {
//         $user = Auth::user();
//         return view('profiles.edit', ['user' => $user]);
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, $id)
//     {
//         $user = Auth::user();

//         $validated = $request->validate([
//             'name' => 'required|string|max:255',
//             // 'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
//             'bio' => 'nullable|string|max:1000',
//         ]);

//         $user->update($validated);

//         return redirect()->route('profiles.show', ['profile' => $user->id])->with('success', 'Profile updated successfully.');
//     }


//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }