<?php

namespace App;



class Comment extends Model
{
    public function product()
    {
        return $this->belongsTo(Car::class);
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
