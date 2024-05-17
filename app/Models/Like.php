<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'like';
    protected $primaryKey = 'id';

    public $timestamps = true;
    protected $fillable = [
        'id_users',
        'id_post',
        'id_story',
        'id_comment',
        'tipe'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
    
    public function story()
    {
        return $this->belongsTo(Post::class, 'id_story');
    }
}
