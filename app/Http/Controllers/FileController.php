<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('profile_picture'))
        {
            $image = $request->file('profile_picture');
            $filename = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('posts/tmp/' . $folder . '/', $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
            ]);

            return $folder;
        }

        return '';
    }
}
