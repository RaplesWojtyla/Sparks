<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all();
        $users = User::all();
        $suggestUsers = User::where('name', '!=' , $user->name)->get();

        return view('dashboard', [
            'posts' => $posts,
            'suggestUsers' => $suggestUsers,
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
