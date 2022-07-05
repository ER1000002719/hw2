<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'Username', 'Pass', 'Email', 'Nome', 'Cognome',
    ];
    
    public function posts() {
        return $this->hasMany("App\Models\Post");
    }
    
    public function likedPosts() {
        return $this->belongsToMany('App\Models\Post', 'likes', 'userid', 'postid');
    }

    /*
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    */
}
