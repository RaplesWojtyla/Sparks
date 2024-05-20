<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $table = 'bookmark';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_users',
        'id_post',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function posts()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
}
