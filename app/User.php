<?php

namespace App;

use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Question;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function favorites(){
       return $this->hasMany(Favorite::class,'user_id');
    }

    public function questions(){
        return $this->hasMany(Question::class,'created_by');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
