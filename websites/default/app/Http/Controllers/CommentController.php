<?php

namespace App\Http\Controllers;

use App\Car;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {   //require login to access controller
        $this->middleware('auth')->except(['index']);
    }
    public function store(Car $car)
    {
        $this->validate(request(), ['body' =>'required|min:10|max:500']);
        $car->addComment(request('body','user_id'));
        
        return back();
    }
}

