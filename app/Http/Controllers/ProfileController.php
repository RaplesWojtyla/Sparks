<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($userId)
    {
        $user = User::where('id', $userId)->first();
        $posts = Post::where('id_users', $userId)->get();
        $bookmarks = Bookmark::where('id_users', $userId)->get();

        if ($user == Auth::user())
        {
            return view('myprofile', [
                'user' => $user,
                'posts' => $posts,
                'bookmarks' => $bookmarks,
            ]);
        }
        else
        {
            return view('urprofile', [
                'user' => $user,
                'posts' => $posts,
                'bookmarks' => $bookmarks,
            ]);
        } 
    }
}
