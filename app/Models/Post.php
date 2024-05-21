<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_community', 
        'id_users',
        'caption',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function commments()
    {
        return $this->hasMany(Comment::class, 'id_post');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'id_post');
    }
    
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'id_post');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'id_post');
    }
}
