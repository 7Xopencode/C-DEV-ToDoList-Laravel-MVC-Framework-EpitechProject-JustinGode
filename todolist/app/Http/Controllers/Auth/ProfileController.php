<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $ads = Ad::where('user_id', Auth::id())->paginate(6);
        return view('profile.show', compact('ads'));
    }

    public function showUserProfile($id)
    {
        $user = User::findOrFail($id);
        $ads = $user->ads()->paginate(5);
        return view('profile', compact('user', 'ads'));
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'login' => 'required|string|max:255',
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
    
        $user->update([
            'login' => $request->login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'bio' => $request->bio,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
    

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
}
