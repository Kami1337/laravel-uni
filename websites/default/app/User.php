<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\News;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function news() 
    {
        return $this->hasMany(News::class);
    }

    public function careers() 
    {
        return $this->hasMany(Career::class);
    }
    
    public function inquiries() 
    {
        return $this->hasMany(Inquiry::class);
    }
}
