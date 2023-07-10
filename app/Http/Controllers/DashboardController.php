<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('index', compact('product', 'category'));
    }
    Public function contact()
    {
        return view('contact');
    }
    Public function about()
    {
        return view('about');
    }
    Public function allproducts()
    {
        $products = Product::where('status', 1)->paginate('12');
        $category = Category::withcount('prod')->get();
        // dd($category);
        return view('products', compact('products','category'));
    }

    Public function categorysearch($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->paginate('12');
        $categoryall = Category::withcount('prod')->get();
        // dd($category);
        return view('categorysearch', compact('products','categoryall'));
    }
    public function cart()
    {
        $cartItem = Cart::where('user_id' , Auth::id())->get();
        return view('cart', compact('cartItem'));
    }
    public function checkout()
    {
        $cartitem = Cart::where('user_id',Auth::id())->get();
        $total = 0;
        foreach($cartitem as $item){
            $ubtotal = $item->product->price * $item->prod_qty;
            $total += $ubtotal;
        }
        // $prod_id = $cartitem->prod_id->product->sum('price');
        // dd($total);
        return view('checkout', compact('cartitem', 'total'));
    }
    public function singleproduct($slug){
        $product = Product::where('slug', $slug)->with('reviews')->first();
        $averageRating = Reviews::where('prod_id', $product->id)
        ->selectRaw('SUM(stars)/COUNT(user_id) AS avg_rating')
        ->first()
        ->avg_rating;
        // dd($product);
        if(isset($product)){
        $relatedprod = Product::where('category_id', $product->category_id)->get();
        }
        return view('singleproduct', compact('product','relatedprod', 'averageRating'));
    }



    public function search(Request $request)
    {
        $products = Product::where('category_id', $request->cat)
        ->where('name', 'LIKE', "%{$request->name}%")->paginate(10);
        $category = Category::all();
        return view('products', compact('products','category'));
    }

}
