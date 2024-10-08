<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('admin.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'username' => ['required', 'string', 'unique:users,username'],
            'password' => ['required', 'string']
        ]);

        // Create a new admin record in the database
        User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('user.index')->with('success', 'Admin added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.edit', ['user' => $user]);
    }

    /**
     * Update the username of the specified resource.
     */
    public function updateUsername(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'unique:users,username,' . $user->id],
        ]);

        $user->update([
            'username' => $data['username'],
        ]);

        return redirect()->route('user.index')->with('success', 'Username updated successfully.');
    }

    /**
     * Update the password of the specified resource.
     */
    public function updatePassword(Request $request, User $user)
    {
        $data = $request->validate([
            'prev_password' => ['required', 'string'],
            'new_password' => ['required', 'string'],
        ]);
    
        if (!Hash::check($data['prev_password'], $user->password)) {
            return redirect()->back()->withErrors(['prev_password' => 'The previous password is incorrect.']);
        }
    
        $user->update([
            'password' => bcrypt($data['new_password']),
        ]);
    
        return redirect()->route('user.index')->with('success', 'Password updated successfully.');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Check if the authenticated user is trying to delete their own account
        if (Auth::id() !== $user->id) {
            return redirect()->route('user.index')->with('error', 'You can only delete your own account.');
        }

        // Log the user out after their account is deleted
        Auth::logout();

        // Delete the admin record from the database
        $user->delete();

        // Redirect to the home page with a success message
        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}
