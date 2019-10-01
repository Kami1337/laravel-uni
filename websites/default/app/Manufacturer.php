<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;

class Manufacturer extends Model
{
    protected $fillable = ['category'];
    public function cars()
    {
        return $this->belongsToMany(Car::class);
        //App\Post::with('tags')->get();
        //grabs all posts associated with tags without doing double db query
    }

    public function getRouteKeyName()
    {
        return 'name';
        //returns above table associated with primary 
        //key instead of key itself for human friendly reading
    }
}
