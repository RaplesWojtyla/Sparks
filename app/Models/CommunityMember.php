<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityMember extends Model
{
    use HasFactory;
    protected $table = 'member_community';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_community',
        'id_follower',
        'type',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_follower');
    }

    public function community()
    {
        return $this->belongsTo(Community::class, 'id_community');
    }
}
