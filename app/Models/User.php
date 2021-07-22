<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //declaring the relationship between the user and the address
    //the user has only one address
    public function address(){
        // return $this->hasOne('App\Models\Address');
        //another way of calling the address model
        return $this->hasOne(Address::class);

    }
    //A user might have many addresses
    //  It will return user addresses
    public function addresses(){

        return $this->hasMany(Address::class);

    }

    public function posts(){

        return $this->hasMany(Post::class);

    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}
