<?php

namespace App;

use Carbon\Carbon;
use App\Manufacturer;
use App\Enginetype;


class Car extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {   
        $user_id=auth()->id();
        $this->comments()->create(compact('body','user_id'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images($id)
    {
        $product = Car::find($id);
        return json_decode($product->filename);
    }
 
    public function coverImage($id)
    {
        return $this->images($id)[0];
    }

    // public function scopeFilter($query, $filters)
    // {
    //     if(isset($filter['month']))
    //     {
    //         if($month = $filters['month'])
    //         {
    //             $query->whereMonth('created_at', Carbon::parse($month)->month);
    //         }
    //         if($year = $filters['year'])
    //         {
    //             $query->whereYear('created_at', $year);
    //         }
    //     }
    // }
    // public static function archives()
    // {
    //     return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
    //     ->groupBy('year','month')
    //     ->orderByRaw('min(created_at) desc')
    //     ->get()
    //     ->toArray();    
    // }

    public function manufacturer()
    {
        return $this->belongsToMany(Manufacturer::class);
    }
    public function enginetype()
    {
        return $this->belongsToMany(Enginetype::class);
    }
    public function index()
    {
        return $this->id;
    }
}
