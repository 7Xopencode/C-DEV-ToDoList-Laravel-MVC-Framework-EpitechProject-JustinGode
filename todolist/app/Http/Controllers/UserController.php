<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {  
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:255|unique:users',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|string',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
        ]);

        User::create([
            'login' => $request->login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'bio' => $request->bio,
            'avatar' => $request->avatar,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'login' => 'required|string|max:255|unique:users,login,' . $user->id,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15|unique:users,phone,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
