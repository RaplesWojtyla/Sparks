<?php

namespace App\Http\Controllers;

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
        $notifications = Notification::take(6)->get();
        
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

    public function create()
    {
        //
    }

    public function countComments()
    {

    }

    public function countLikes(Request $request, $postId)
    {
        $user = Auth::user();
        $post = Post::findOrFail($postId);

        $liked = Like::where('id_post', $post->id)->where('id_users', $user->id)->first();

        if ($liked) {
            $liked->delete();

            Notification::where('id_post', $post->id)
                ->where('id_users', $user->id)
                ->where('tipe', 'like')
                ->delete();
        } else {

            Like::create([
                'id_users' => $user->id,
                'id_post' => $post->id,
                'id_story' => NULL,
                'id_comment' => NULL,
                'tipe' => '1'
            ]);

            Notification::create([
                'id_users' => $user->id,
                'id_post' => $post->id,
                'tipe' => 'like',
            ]);

        }

        return response()->json([
            'likesCount' => $post->likes()->count(),
            'notifications' => Notification::where('seen', NULL)->take(6)->get()
        ]);
    }
}
