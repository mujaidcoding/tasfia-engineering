<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // ///////// Profile Update as per Authentic User


    public function UserProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('backend.admin.auth.profile', compact('profileData'));
    }// End Method


    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        // Handle image upload if provided
        if ($request->hasFile('photo')) {
            $oldImage = $data->photo;
            $path = "Admin/user/image/";
            $image = $request->file('photo');
            $imageName = $image->getClientOriginalName();

            // Check if the new image is the same as the old image
            if ($oldImage && File::exists($oldImage) && hash_file('md5', $image->getRealPath()) === hash_file('md5', $oldImage)) {
                return redirect()->back()->with('error', 'The image already exists. Please upload a new image.');
            }

            // Delete the old image file if it exists
            if ($oldImage && File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $image->move($path, $imageName);
            $data->photo = $path . $imageName;
        }

        $data->save();

        return redirect()->back()->with('update', [
            'type' => 'success',
            'message' => 'Profile Update Successfully.',
        ]);

    }// End Method

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('backend.admin.auth.password', compact('profileData'));

    }// End Method


    public function UserPasswordUpdate(Request $request)
    {
        /// Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {

            return redirect()->back()->with('update', [
                'type' => 'error',
                'message' => 'Old Password Not Match.',
            ]);
        }

        /// Update The new Password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('update', [
            'type' => 'success',
            'message' => 'User Password Update Successfully.',
        ]);

    }// End Method


    public function UserProfileDelete($id)
    {
        // Find the user
        $user = User::find($id);

        // Check if the authenticated user has the 'super-admin' role
        if ($user->hasRole('super-admin')) {
            return redirect()->back()->with('update', [
                'type' => 'error',
                'message' => 'You are a super-admin. Deleting user profiles is not allowed.',
            ]);
        }

        // Check if the authenticated user is attempting to delete their own profile
        if (Auth::user()->id === $user->id) {
            $user->roles()->detach();
            Auth::logout();
            $user->delete();

            return redirect()->route('home')->with('update', [
                'type' => 'success',
                'message' => 'Your profile has been deleted successfully. You have been logged out.',
            ]);
        }


        // If none of the conditions match, handle it as a normal user attempting to delete another user
        if (!is_null($user)) {
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('home')->with('update', [
                'type' => 'success',
                'message' => 'User Delete Successfully.',
            ]);
        }

        // Handle the case where the user to be deleted is not found
        return redirect()->route('home')->with('update', [
            'type' => 'error',
            'message' => 'User not found.',
        ]);
    }


    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('update', [
            'type' => 'success',
            'message' => 'Logout Success',
        ]);
    } // End Method


}
