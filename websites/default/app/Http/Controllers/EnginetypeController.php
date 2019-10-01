<?php

namespace App\Http\Controllers;
use App\Enginetype;
use Illuminate\Http\Request;

class EnginetypeController extends Controller
{
    public function index(Enginetype $enginetype)
    {
        $cars = $enginetype->cars;
        return view('cars.index', compact('cars'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required'
        ]);
        $enginetype = new Enginetype;
        $enginetype->name = $request->name;
        $enginetype->save();
        return redirect()->route('cms')->with('success', 'Engine type added');
    }
    public function show(Enginetype $enginetype)
    {
        return view('enginetypes.create', compact('enginetype'));
    }
    public function editView(Enginetype $enginetype)
    {
        return view('enginetypes.edit', compact('enginetype'));
    }
    public function delete(Request $request, $id)
    {
        $enginetype = Enginetype::find($id);
        $enginetype->destroy($id);
        return redirect()->route('cms')->with('error', 'Engine type removed');
    }

    public function edit(Request $request, $id)
    {
        $enginetype = Enginetype::find($id);
        $enginetype->name = $request->input('name');
        $enginetype->save();
        return redirect()->route('cms')->with('success', 'Engine type edited');
    }
}

