<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            "name" => "required|max:100",
            "username" => "required|unique:users|max:100",
            "email" => "required|email|unique:users",
            "password" => "required|min:6"
        ]);
        User::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        return to_route('login')->with('status', 'Congratulation!');
    }
}
