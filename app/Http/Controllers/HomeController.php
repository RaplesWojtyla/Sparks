<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Follows;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::inRandomOrder()->get();
        $notifications = Notification::orderByDesc('id')->get();
        
        $idFollowers = Follows::where('id_following', $user->id)->pluck('id_follower');
        $idFollowings = Follows::where('id_follower', $user->id)->pluck('id_following');
        $follbacks = User::whereIn('id', $idFollowers)->whereNotIn('id', $idFollowings)->get();
        $suggestUsers = User::where('name', '!=', $user->name)
                            ->whereNotIn('id', $idFollowers)
                            ->whereNotIn('id', $idFollowings)
                            ->get();

        return view('dashboard', [
            'posts' => $posts,
            'suggestUsers' => $suggestUsers,
            'notifications' => $notifications,
            'follbacks' => $follbacks,
        ]);
    }
}
