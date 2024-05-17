<?php

namespace App\Http\Controllers;

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
        $notifications = Notification::where('seen', NULL)->take(6)->get();
        $suggestUsers = User::where('name', '!=' , $user->name)->get();

        return view('dashboard', [
            'posts' => $posts,
            'suggestUsers' => $suggestUsers,
            'notifications' => $notifications,
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

        if($liked)
        {
            $liked->delete();

            Notification::where('id_post', $post->id)
                        ->where('id_users', $user->id)
                        ->where('tipe', 'like')
                        ->delete();
        }
        else
        {
            
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
