<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('dashboard', [
            'posts' => $posts,
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

        if($liked) $liked->delete();
        else
        {
            Like::create([
                'id_users' => $user->id,
                'id_post' => $post->id,
                'id_story' => NULL,
                'id_comment' => NULL,
                'tipe' => '1'
            ]);
        }

        return response()->json(['likesCount' => $post->likes()->count()]);
    }
}
