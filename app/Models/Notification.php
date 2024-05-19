<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notification';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_users',
        'id_post',
        'id_story',
        'id_following',
        'tipe'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    
    public function posts()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
    
    public function stories()
    {
        return $this->belongsTo(Story::class, 'id_story');
    }

    // public function following()
    // {
    //     return $this->belongsTo(User::class, 'id_following');
    // }
}
