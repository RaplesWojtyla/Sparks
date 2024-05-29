<?php

namespace App\Http\Controllers;

use App\Models\FilePost;
use App\Models\Post;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(Request $request)
    {
        Post::create([
            'id_community' => '1',
            'id_users' => Auth::user()->id,
            'caption' => $request->caption,
        ]);

        $newPost = Post::where('id_users', Auth::user()->id)->latest('id')->first();
        $tmpfile = TemporaryFile::where('folder', $request->file_post)->first();

        if ($newPost && $tmpfile)
        {
            Storage::copy('posts/tmp/' . $tmpfile->folder . '/' . $tmpfile->filename, 'user-posts/' . $tmpfile->folder . '/' . $tmpfile->filename);
            $path = 'storage/user-posts/' . $tmpfile->folder . '/' . $tmpfile->filename;

            FilePost::create([
                'id_post' => $newPost->id,
                'berkas' => $path,
            ]);

            Storage::deleteDirectory('posts/tmp/' . $tmpfile->folder);
            $tmpfile->delete();
        }

        return redirect('/dashboard');
    }

    public function update()
    {

    }

    public function delete($postId)
    {
        Post::findOrFail($postId)->first()->delete();

        return back();
    }
}
