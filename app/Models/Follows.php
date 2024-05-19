<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    use HasFactory;
    protected $table = 'follows';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_follower',
        'id_following',
    ];
}
