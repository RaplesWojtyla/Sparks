<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    protected $table = 'follower';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_follower',
        'id_following',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_follower');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'id_following');
    }
}
