<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->fill($request->validated());


        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's image */


public function updateImage(Request $request): RedirectResponse
{
    $request->validate([
        'image' => ['required', 'image', 'max:2048'], // 2MB max size
    ]);
    // Ensure the user is authenticated
    if (!Auth::check()) {
        return Redirect::route('login')->withErrors(['message' => 'You must be logged in to update your profile image.']);
    }

    $user = Auth::user(); // Get the logged-in user

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Optional: Delete the old image if it exists
        if ($user->image && file_exists(public_path('uploads/user/' . $user->image))) {
            unlink(public_path('uploads/user/' . $user->image));
        }

        $storeNameSlug = Str::slug($user->name); // Using user's name for slug
        $imageName = $storeNameSlug . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/user'), $imageName);


        $user->image = $imageName; // Save image file name (or path)
        $user->save();
    }

 return Redirect::route('profile.edit')->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Ensure the user is authenticated

        if (!Auth::check()) {
            return Redirect::route('login')->withErrors(['message' => 'You must be logged in to delete your account.']);
        }

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        // Optional: Delete the user's image if it exists
        if ($user->image && file_exists(public_path('uploads/user/' . $user->image))) {
            unlink(public_path('uploads/user/' . $user->image));
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
