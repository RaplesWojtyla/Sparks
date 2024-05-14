<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'berkas',
        'size',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function community()
    {
        return $this->has(Community::class, 'id_creator');
    }
    
    public function community_member()
    {
        return $this->has(CommunityMember::class, 'id_follower');
    }

    public function follower()
    { 
        return $this->hasMany(Follower::class, 'id_follower');
    }
     
    public function following()
    {
        return $this->hasMany(Follower::class, 'id_following');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'id_users');
    }

    public function story()
    {
        return $this->hasMany(Story::class, 'id_users');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_commenter');
    }
    
    public function like()
    {
        return $this->hasMany(Like::class, 'id_users');
    }
}
