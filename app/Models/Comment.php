<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Jenssegers\Mongodb\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'mongodb';
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'Content', 'Poster', 'Post' 
    ];
}