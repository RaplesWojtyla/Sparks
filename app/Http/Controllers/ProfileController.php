<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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

        $tmpFile = TemporaryFile::where('folder', $request->profile_picture)->first();

        if ($tmpFile)
        {
            Storage::copy('posts/tmp/' . $tmpFile->folder . '/' . $tmpFile->filename, 'user-profile-pictures/' . $tmpFile->folder . '/' . $tmpFile->filename);
            $path = 'storage/user-profile-pictures/' . $tmpFile->folder . '/' . $tmpFile->filename;

            User::where('id', Auth::user()->id)->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'profile_picture' => $path,
                'bio' => $request->bio,
            ]);

            Storage::deleteDirectory('posts/tmp/' . $tmpFile->folder);
            $tmpFile->delete();
        }
        else $request->user()->save();

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
}
