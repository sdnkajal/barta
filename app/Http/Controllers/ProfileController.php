<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = User::select(['name', 'id', 'bio'])->findOrFail(Auth::user()->id);
        return view('profile', compact('profile'));
    }

    public function editProfile()
    {
        $profile = User::select(['name', 'id', 'username', 'email', 'first_name', 'last_name', 'bio'])->find(Auth::user()->id);
        return view('edit-profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'sometimes|max:50',
            'last_name' => 'sometimes|max:50',
            'name' => 'sometimes|required|max:100',
            'email' => 'sometimes|required|max:100|email|unique:users,email,'.Auth::user()->id,
            'bio' => 'sometimes|max:6000'
        ]);
        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();
        return to_route('profile');

    }
}
