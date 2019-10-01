<?php

namespace App\Http\Controllers;
use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index(Manufacturer $manufacturer)
    {
        $cars = $manufacturer->cars->where('status',!1)->sortByDesc('created_at');
        return view('cars.index', compact('cars','carCount'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required'
        ]);
        $manufacturer = new Manufacturer;
        $manufacturer->filename= $request->filename;
        $manufacturer->name = $request->name;
        $manufacturer->save();
        return redirect()->route('cms')->with('success', 'Manufacturer added');
    }
    public function show(Manufacturer $manufacturer)
    {
        return view('manufacturers.create', compact('manufacturer'));
    }
    public function editView(Manufacturer $manufacturer)
    {
        return view('manufacturers.edit', compact('manufacturer'));
    }
    public function delete(Request $request, $id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->destroy($id);
        return redirect()->route('cms')->with('error', 'Manufacturer removed');
    }

    public function edit(Request $request, $id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->name = $request->input('name');
        $manufacturer->filename = $request->input('filename');  
        $manufacturer->save();
        return redirect()->route('cms')->with('success', 'Manufacturer edited');
    }
}
