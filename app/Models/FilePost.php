<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePost extends Model
{
    use HasFactory;
    
    protected $table = 'file_post';
    protected $primaryKey = 'id';
    protected $fillable = ['id_post', 'berkas'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
}
