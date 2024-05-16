<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;




class NotifController extends Controller
{
    //
    public function index()
    {
        $notifications = Notification::all();
        $likes = Like::findOrFail($notifications->id);
        $comment = Comment::all();
        $story = Story::all();

        $posts = Post::findOrFail($likes->id_post);


        return view('dashboard', [
            'notifications' => $notifications,
        ]);
    }


    
}
