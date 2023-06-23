<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function addcart(Request $request)
    {
        $product_id  = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $user  = Auth::user();
            // if($user->hasVerifiedEmail())
            // {
                $product_check = Product::where('id',$product_id)->first();
                if($product_check)
                {
                    if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                    {
                       return response()->json(['status'=> $product_check->name." Already In Cart"]);
                    }
                    else
                    {
                        $cartItem = new Cart();
                        $cartItem->prod_id = $product_id;
                        $cartItem->user_id = Auth::id();
                        $cartItem->prod_qty = $product_qty;
                        $cartItem->save();
                        return response()->json(['status' => $product_check->name." Added to Cart"]);
                    }
                }
            // }
            // else
            // {
                // return response()->json(['status' => "Please Verify you Email"]);
            // }
        }
        else
        {
            return response()->json(['status' => "Please Login First..."]);
        }

    }
    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $user  = Auth::user();
                $prod_id  = $request->input('prod_id');
                if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    $cartItem =Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                    $cartItem->delete();
                    return response()->json(['status'=>"Product Deleted successfully"]);
                }

        }
        else
        {
            return response()->json(['status' => "Please Login First..."]);
        }
    }
    public function updateCart(Request $request)
    {
        $prod_id  = $request->input('prod_id');
        $product_qty  = $request->input('prod_qty');
        if(Auth::check())
        {
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "Quantity Updated"]);
            }

        }
        else
        {
            return response()->json(['status' => "Please Login First..."]);
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
