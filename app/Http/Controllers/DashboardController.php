<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reviews;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::limit(12)->get();
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
        $product = Product::where('slug', $slug)->with('reviews','variants')->first();
        $variant = Variant::where('prod_id', $product->id)->get();
        $color_variant = Variant::where('prod_id', $product->id)
        ->where('type', "Color")
        ->get();
        $storage_variant = Variant::where('prod_id', $product->id)
        ->where('type', "Storage")
        ->get();

        $averageRating = Reviews::where('prod_id', $product->id)
        ->selectRaw('SUM(stars)/COUNT(user_id) AS avg_rating')
        ->first()
        ->avg_rating;
        // dd($product);
        if(isset($product)){
        $relatedprod = Product::where('category_id', $product->category_id)->get();
        }
        return view('singleproduct', compact('product','relatedprod', 'averageRating', 'variant', 'color_variant', 'storage_variant'));
    }

    public function variant(Request $request)
    {
        $variant_id  = $request->input('variant_id');
        $prod_id = $request->input('prod_id');
        $product = Product::where('id', $prod_id)->first();
        $averageRating = Reviews::where('prod_id', $product->id)
        ->selectRaw('SUM(stars)/COUNT(user_id) AS avg_rating')
        ->first()
        ->avg_rating;
        // dd($product);
        if(isset($product)){
        $relatedprod = Product::where('category_id', $product->category_id)->get();
        }
        $variant = Variant::where('id', $variant_id)->with('variantimage')->first();
        $color_variant = Variant::where('prod_id', $product->id)
        ->where('type', "Color")
        ->get();
        $storage_variant = Variant::where('prod_id', $product->id)
        ->where('type', "Storage")
        ->get();
        if($variant->type == "Color")
        {
            return view('singleproduct', compact('product','relatedprod', 'averageRating', 'variant', 'color_variant', 'storage_variant'));
        }
        return response()->json(['variant' => $variant]);
    }



    public function search(Request $request)
    {
        $products = Product::where('category_id', $request->cat)
        ->where('name', 'LIKE', "%{$request->name}%")->paginate(10);
        $category = Category::all();
        return view('products', compact('products','category'));
    }

    public function invoice($id)
    {
        $order = Order::where('tracking_no', $id)->first();
        // dd($order);
        return view('invoice', compact('order'));
    }

}
