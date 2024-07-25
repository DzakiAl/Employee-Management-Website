<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // show log in form
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/dashboard'); // Redirect to dashboard if already authenticated
        }
        return view('login.index');
    }

    // checking credentials if it match
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/dashboard');
        }
    
        return redirect()->back()->withErrors(['username' => 'The provided credentials do not match our records.']);
    }

    // log out function
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
