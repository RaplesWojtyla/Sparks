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

        if ($saved) $saved->delete(); // Jika sudah disave, maka dihapus
        else 
        {
            Bookmark::create([
                'id_users' => Auth::user()->id,
                'id_post' => $postId,
            ]);
        }

        return back();
    }

    public function delete($bookmarkId)
    {
        $saved = Bookmark::where('id_users', Auth::user()->id)
                ->where('id_post', $bookmarkId)->first();
        
        if ($saved != NULL) 
        {
            $saved->delete();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil menghapus postingan tersebut dari bookmark.'
            ]);
        }
        else return response()->json([
            'success' => true,
            'message' => 'Postingan tidak ditemukan dibookmark.'
        ], 404);
    }
}
