<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function create($postId)
    {
        $saved = Bookmark::where('id_users', Auth::user()->id)
                ->where('id_post', $postId)->first();

        if ($saved) $saved->delete();
        else 
        {
            Bookmark::create([
                'id_users' => Auth::user()->id,
                'id_post' => $postId,
            ]);
        }

        return back();
    }
}
