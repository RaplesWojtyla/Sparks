<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $table = 'community';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_creator',
        'name',
        'description',
        'berkas',
        'size',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_creator');
    }
    
    public function community_member()
    {
        return $this->has(CommunityMember::class, 'id_community');
    }
}
