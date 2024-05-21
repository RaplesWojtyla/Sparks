<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->merge([
            'profile_picture' => $request->get('profile_picture', 'storage/users-avatar/avatar.png'),
        ]);
        
        $request->validate([
            'username' => ['required', 'string', 'max:25', 'unique:users,username', 'alpha_num'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_picture' => ['']
        ]);

        $tmpFile = TemporaryFile::where('folder', $request->profile_picture)->first();

        if ($tmpFile)
        {
            Storage::copy('posts/tmp/' . $tmpFile->folder . '/' . $tmpFile->filename, 'user-profile-pictures/' . $tmpFile->folder . '/' . $tmpFile->filename);
            $path = 'storage/user-profile-pictures/' . $tmpFile->folder . '/' . $tmpFile->filename;

            $user = User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'profile_picture' => $path,
            ]);

            Storage::deleteDirectory('posts/tmp/' . $tmpFile->folder);
            $tmpFile->delete();
        }
        else
        {
            $user = User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'profile_picture' => $request->profile_picture
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('profile_picture'))
        {
            $image = $request->file('profile_picture');
            $filename = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('posts/tmp/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
            ]);

            return $folder;
        }

        return '';
    }
}
