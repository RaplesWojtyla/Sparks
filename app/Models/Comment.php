<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_commenter',
        'id_post',
        'comment',
        'id_parent_commenter',
    ];

    public function users()
    {
        $this->belongsTo(User::class, 'id_commenter');
    }

    public function post()
    {
        $this->belongsTo(Post::class, 'id_post');
    }
}
