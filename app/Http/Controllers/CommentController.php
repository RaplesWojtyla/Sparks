<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request, $postId)
    {
        $comment = Comment::create([
            'id_commenter' => Auth::user()->id,
            'id_post' => $postId,
            'comment' => $request->comment,
        ]);

        Notification::create([
            'id_users' => Auth::user()->id,
            'id_post' => $postId,
            'tipe' => 'comment'
        ]);

        return response()->json([
            'comment' => $comment->comment,
            'username' => Auth::user()->username,
            'profile_picture' => Auth::user()->profile_picture,
            'commentsCount' => Post::findOrFail($postId)->commments()->count(),
        ]);
    }
}
