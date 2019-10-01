<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Manufacturer;
use App\User;
use App\Order;
use App\Enginetype;
use App\Inquiry;
use App\News;
use App\Hours;
use App\Career;

class CmsController extends Controller
{
   
    public function index()
    {       
        //the one controller to rule them all
        $cars = Car::all()->where('status',!'1')->sortByDesc('created_at');
        $archivedCars = Car::all()->where('status','1')->sortByDesc('updated_at');
        
        $careers = Career::all();
        $categories = Manufacturer::all();
        $enginetypes = Enginetype::all();
        
        $comInq = Inquiry::all()->where('user_id',!NULL)->sortByDesc('updated_at');
        $comInqTotal = $comInq->count(); 
        
        $incInq = Inquiry::all()->where('user_id',NULL)->sortByDesc('updated_at');
        $incInqTotal = $incInq->count();
        
        $users = User::all();
        $hours = Hours::all();
        $news = News::all();

        $orders = Order::all()->where('completed',!'1')->sortBy('created_at');
        $orderTotal = $orders->count();
        $completedOrders = Order::all()->where('completed','1')->sortByDesc('updated_at');
        $completedTotal = $completedOrders->count();
        
        return view ('cms.index', compact('cars', 'categories', 'users', 'orders','news','enginetypes','completedTotal',
        'completedOrders','orderTotal','archivedCars','comInq','incInq', 'comInqTotal','incInqTotal','hours','careers'));
        
    }

    public function completeOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->completed = '1';
        $order->save();
        return back()->with('success', 'Order fullfilled');
    }
    public function archive(Request $request, $id)
    {
        $car = Car::find($id);
        $car->status = '1';
        $car->save();
        return back()->with('success', 'Car archived');
    }
    public function unArchive(Request $request, $id)
    {
        $car = Car::find($id);
        $car->status = '0';
        $car->save();
        return back()->with('success', 'Car restored');
    }
    public function hours(Request $request, $id)
    {
        $hours = Hours::find($id);
        $hours->hours = $request->input('hours');
        $hours->save();
        return redirect()->route('cms')->with('success', 'Work hours edited');
    }
    public function type(Request $request, $id)
    {
        $user = User::find($id);
        $user->type = $request->input('type');
        $user->save();
        return redirect()->route('cms')->with('success', 'User permissions edited');
    }
}
