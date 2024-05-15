<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = 'stroy';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_users',
        'caption',
        'berkas',
        'size',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'id_story');
    }
}
