<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;

class Enginetype extends Model
{
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
