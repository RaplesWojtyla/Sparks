<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        // dd(Auth::user());
        Auth::user()->following()->attach($user);


        Notification::create([
            'id_users' => Auth::user()->id,
            'id_following' => '1',
            'tipe' => $user->id,
        ]);

        return back()->with('success', 'Followed');
    }
    
    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user);
        return back()->with('success', 'Followed');
    }
}