<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Report;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(User $user): View
    {
        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, User $user): RedirectResponse
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

            User::where('id', $user->id)->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'profile_picture' => $path,
                'bio' => $request->bio,
            ]);

            Storage::deleteDirectory('posts/tmp/' . $tmpFile->folder);
            $tmpFile->delete();
        }
        else
        {
            User::where('id', $user->id)->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'bio' => $request->bio,
            ]);
        }

        return Redirect::route('profile.edit', $user)->with('status', 'profile-updated');
    }

    public function report(Request $request, $idUser)
    {
        $reportMessage = $request->get('report');

        $reported = Report::where('id_users_reported', $idUser)
                    ->where('id_users', Auth::user()->id)->first();
        
        if ($reported) 
        {
            $reported->update([
                'report' => $reportMessage,
            ]);

            return response()->json(['message' => 'Report berhasil diupdate']);
        }

        Report::create([
            'id_users' => Auth::user()->id,
            'id_users_reported' => $idUser,
            'report' => $reportMessage,
        ]);

        return response()->json(['message' => 'User berhasil dilaporkan.']);
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
