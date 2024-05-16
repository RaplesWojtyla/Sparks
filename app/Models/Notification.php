<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notification';
    protected $primaryKey = 'id';

    public $timestamps = true;
    protected $fillable = [
        'id_users',
        'id_comment',
        'id_like',
        'id_follower',
        'tipe'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    
    public function comment()
    {
        return $this->belongsTo(Post::class, 'id_comment');
    }
    
    public function like()
    {
        return $this->belongsTo(Post::class, 'id_like');
    }

    public function follower()
    {
        return $this->belongsTo(Post::class, 'id_follower');
    }
}
