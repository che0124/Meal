<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
use App\Models\Profile;
use App\Models\Avatar;
>>>>>>> eb7a5dad32c542ede0b90f213e574b577fd647cc
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profiles.index', ['users' => User::all()]);
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
<<<<<<< HEAD

=======
        $profile = new Profile;
        $profile->username = $request->input('username');
        $profile->gender = $request->input('gender');
        $profile->birthday = $request->input('birthday');
        $profile->bio = $request->input('bio');
        $profile->profile_picture = $request->file('image');
        $profile->save();



        return redirect(route('profiles.show', ['profile' => $profile]));
>>>>>>> eb7a5dad32c542ede0b90f213e574b577fd647cc
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profiles.show', ['user' => $user]);
=======
    public function show(Profile $profile)
    {
        $user = $profile;

        return view('profiles.show', ['profile' => $profile, 'user' => $user]);
>>>>>>> eb7a5dad32c542ede0b90f213e574b577fd647cc
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit($id)
    {
        $user = Auth::user();
        return view('profiles.edit', ['user' => $user]);
=======
    public function edit(Profile $profile)
    {
        $user = Auth::user();
        $avatar = $profile->avatar;
        return view('profiles.edit', ['profile' => $profile, 'user' => $user, 'avatar' => $avatar]);
>>>>>>> eb7a5dad32c542ede0b90f213e574b577fd647cc
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);

        $user->update($validated);

        return redirect()->route('profiles.show', ['profile' => $user->id])->with('success', 'Profile updated successfully.');
    }

=======
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

>>>>>>> eb7a5dad32c542ede0b90f213e574b577fd647cc

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
