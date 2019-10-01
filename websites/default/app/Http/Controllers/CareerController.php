<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;

class CareerController extends Controller
{
    public function index()
    {   
        $career = Career::all();
        return view ('career.index', compact('career'));
    }

    public function show(Career $career)
    {
        return view('career.single', compact('career'));
    }
    
    public function create()
    {
        return view('career.create', compact('career'));
    }

    public function edit(Career $career)
    {
        return view('career.edit', compact('career'));
    }

    public function validateReq(Request $request)
    {
        $this->validate($request, [
            'title' =>'required|min:5',
            'body' =>'required|min:5',
        ]);
        
    }

    public function delete(Request $request, $id)
    {
        $career = Career::find($id);   
        $career->destroy($id);
        return redirect()->route('cms')->with('error', 'Career removed');
    }

    public function update(Request $request, $id)
    {  
        $career = Career::find($id);
        $this->validateReq($request);
        $career->title = $request->input('title');
        $career->body = $request->input('body');
        $career->user_id = auth()->user()->id;
        $career->save();        
        return redirect()->route('cms')->with('success', 'Career edited');
    }
    
    public function store(Request $request)
    {
        $this->validateReq($request);
        $career= new Career(request(['title','body']));  
        $career->user_id = auth()->user()->id;
        $career->save();
        return redirect()->route('cms')->with('success', 'Career added');
    }
}
