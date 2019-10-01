<?php

namespace App\Http\Controllers;

use App\Car;
use App\Manufacturer;
use App\Order;
use Illuminate\Http\Request;

class CarController extends Controller{
    
    public function __construct()
    {   //require login to access controller
        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {   
        $cars = Car::all()->where('status',!1)->sortByDesc('created_at');
        return view ('cars.index', compact('cars'));
        return session('message');

    }
    public function show(Car $car)
    {
        return view('cars.single', compact('car'));
    }
    public function create()
    {
        return view('cars.create', compact('car'));
    }

    public function editView(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function validateReq(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'description' =>'required|min:5',
            'price' =>'required|numeric',
            'mileage' =>'required|numeric',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);
        
    }
    public function delete(Request $request, $id)
    {
        $car = Car::find($id);   
        //detach manufacturer
        $manufacturer = $request->input('manufacturer');
        $car->manufacturer()->detach($manufacturer);
        //detach engine type
        $enginetype = $request->input('enginetype');
        $car->enginetype()->detach($enginetype);
        //and finally delete the record
        $car->destroy($id);
        return redirect()->route('cms')->with('error', 'Car removed');
    }

    public function edit(Request $request, $id)
    {
        
        $car = Car::find($id);
        $this->validateReq($request);
        $car->name = $request->input('name');
        $car->price = $request->input('price');
        $car->discount = $request->input('discount');
        $car->description = $request->input('description');
        $car->mileage = $request->input('mileage');
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
                $car->filename=json_encode($data);  
            }
        }
        $car->user_id = $this->userId();
        $car->save();
        $manufacturer = $request->input('manufacturer');
        //first we remove all attachments from previous tags/manufacturers 
        $car->manufacturer()->detach();
        //and add new ones
        $car->manufacturer()->attach($manufacturer);

        $enginetype = $request->input('enginetype');
        $car->enginetype()->detach();
        $car->enginetype()->attach($enginetype);
        
        return redirect()->route('cms')->with('success', 'Car edited');
    }
    
    public function store(Request $request)
    {
        $this->validateReq($request);

        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
        }
        
        
        $car= new Car(request(['name','description','price','discount','mileage']));  
        $car->user_id=auth()->id();
        $car->filename=json_encode($data); 
        $car->save();
        //grab $manufacturer from request and attach it to car_manufacturer

        $manufacturer = $request->input('manufacturer');
        $car->manufacturer()->attach($manufacturer);

        $enginetype = $request->input('enginetype');
        $car->enginetype()->attach($enginetype);
        return redirect()->route('cms')->with('success', 'Car added');
    }

    public function addToCart(Request $request, $id)
    {
        //compare id with request $id and get all values as array
        $car= Car::where('id',$id)->get();
        //access first array value and translate properties to \cart
        $name=$car[0]->name;
        $description=$car[0]->description;
        $price=$car[0]->price;
        $filename=$car[0]->filename;
        $userId = auth()->user()->id; 
        \Cart::session($userId)->add($id, $name, $price, 1, array('filename'=>$filename,'description'=>$description));
        return back()->with('success', 'car added to cart');
    }

    public function cart()
    {
        $userId = $this->userId();
        $cartCollection = \Cart::session($userId)->getContent();
        $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
        $total = \Cart::session($userId)->getTotal();
        return view ('cart.index', compact('cartCollection','cartTotalQuantity','total'));
    }

    public function removeFromCart(Request $request, $id)
    {
        $userId = $this->userId();
        \Cart::session($userId)->remove($id);
        return back()->with('success', 'Item removed');
    }

    public function plus(Request $request, $id)
    {
        $userId = $this->userId();
        \Cart::session($userId)->update($id, array(
        'quantity' => 1,
      ));
      return back()->with('success', 'Item added');
    }

    public function minus(Request $request, $id)
    {
        $userId = $this->userId();
        \Cart::session($userId)->update($id, array(
        'quantity' => -1,
      ));
      return back()->with('success', 'Item removed');
    }
    public function userId()
    {
        return auth()->user()->id;
    }
    public function cartTotals()
    {
        $userId = $this->userId();
        $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
        $total = \Cart::session($userId)->getTotal();
        return (array('totalQuantity'=>$cartTotalQuantity,'total'=>$total));
    }
    public function cartContent()
    {
        $userId = $this->userId();
        return \Cart::session($userId)->getContent();
    }
    public function checkout()
    {
        $cartContent=$this->cartTotals();
        $cart=$this->cartContent();
        return view ('cart.checkout',compact('cartContent', 'cart'));
    }
    public function newOrder(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);
        $order= new Order(request(['first_name','last_name','address','adress2','country','state','zip']));  
        $order->cart_data = json_encode($this->cartContent());
        $userId = $this->userId();
        $order->total = \Cart::session($userId)->getTotal();
        $order->save();
        \Cart::session($userId)->clear();
        return redirect()->route('store')->with('success', 'Your order has been received, we will email you the details');
    }
}

