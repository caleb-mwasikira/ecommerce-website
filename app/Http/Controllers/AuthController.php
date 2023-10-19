<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Creates a new user account
     */
    public function register(Request $request)
    {
        $credentials = $request->validate([
            "firstname" => "required|min:3|max:255",
            "lastname" => "required|min:3|max:255",
            "email" => "required|unique:users|email",
            "password" => "min:8|max:255",
        ]);

        $user = new User($credentials);
        $user->save();

        return to_route("login")
            ->with("success", "Your account has been created");
    }

    /**
     * Logs in a user to their existing account
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "min:8|max:255",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route("home")
                ->with("success", "You are now logged in");
        }

        return back()->withErrors([
            "email" => "Incorrect email or password",
        ])->onlyInput("email");
    }

    /**
     * Logs out a user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route("home")
            ->with("success", "You have logged out of your account");
    }
}
