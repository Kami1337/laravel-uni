<?php

namespace App;
use App\User;

class Career extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
