<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create($postId)
    {
        $user = Auth::user();
        $post = Post::findOrFail($postId);

        $liked = Like::where('id_post', $post->id)->where('id_users', $user->id)->first();

        if ($liked) 
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
        ]);
    }
}
