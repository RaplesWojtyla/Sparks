<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
}
