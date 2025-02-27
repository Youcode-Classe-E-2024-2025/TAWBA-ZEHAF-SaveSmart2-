<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show() {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }
    public function edit() {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request) {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
        ]);
    
        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile_pictures'), $imageName);
            $user->profile_picture = $imageName;
        }
    
        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->phone = $request->phone;
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
