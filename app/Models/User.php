<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'mail',
        'password',
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

    public function posts(){
        return $this->hasMany(Post::class);
    }

    // authがフォロー
    public function follows(){
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');
    }

    // authがフォローされる
    public function follower(){
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');
    }

    // フォローされているかどうか
    public function is_following($id){
        return $this->follows()->where('followed_id',$id)->first();
    }
}
