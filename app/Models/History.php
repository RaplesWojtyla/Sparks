<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_users',
        'id_searched',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'id_searched');
    }
}
