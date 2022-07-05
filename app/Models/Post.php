<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'Title', 'Game', 'Content', 'Grade', 'Poster','nLikes', 'nComments' 
    ];
    
    public function Poster() {
        return $this->belongsTo("App\Models\Post");
    }
    
    public function Likers() {
        return $this->belongsToMany('App\Models\User', 'likes', 'userid', 'postid');
    }
}
