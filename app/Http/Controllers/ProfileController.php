<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\History;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($userId)
    {
        $user = User::find($userId);
        $posts = Post::where('id_users', $userId)->get();
        
        if ($user == Auth::user())
        {
            $bookmarks = Bookmark::where('id_users', $userId)->get();
            
            return view('myprofile', [
                'user' => $user,
                'posts' => $posts,
                'bookmarks' => $bookmarks,
            ]);
        }
        else
        {
            History::create([
                'id_users' => Auth::user()->id,
                'id_searched' => $user->id,
            ]);
            
            return view('urprofile', [
                'user' => $user,
                'posts' => $posts,
            ]);
        } 
    }
}
