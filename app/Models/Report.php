<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_users',
        'id_post',
        'id_users_reported',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'id_users_reported');
    }

    
}
