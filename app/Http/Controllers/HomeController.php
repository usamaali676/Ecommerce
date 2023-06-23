<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
        {
            $productcount = Product::all()->count();
            $products = Product::all();
            $revenue = Order::sum('total_price');
            $customers = User::where('role_id', 3)->count();
            $order = Order::all();

            return view('home', compact('customers', 'revenue', 'products', 'productcount','order'));
        }
        else
        {
            return redirect()->route('customerdashboard');
        }
    }
}
