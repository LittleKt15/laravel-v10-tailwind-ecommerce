<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        // auth()->login($user);

        return redirect('/logins')->with('success', 'User Registered Successfully!');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return redirect('/')->with('success', 'You have been logged out!');
        return redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect(RouteServiceProvider::HOME)->with('message', 'You are now logged in!');
        }

        return back()->with('error', 'Invalid email or password.');
        // return back()->with('error', 'Invalid Credentials.');
    }
}
