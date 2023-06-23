<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orderitem = OrderItem::find($id);
        return view('admin.orderItem.edit', compact('orderitem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required',
        ]);
        $orderitem = OrderItem::find($id);
        $itemprice = $orderitem->products->price;
        $orderitem->update([
            'qty' =>  $request->qty,
            'price' => $itemprice * $request->qty,
        ]);
        $order_id = Order::where('id', $orderitem->order_id)->first();

        $all_orderitems = OrderItem::where('order_id', $order_id->id)->get();


        $total = 0;
        foreach ($all_orderitems as $item) {

            $subtotal = $item->products->price * $item->qty;
            $total += $subtotal;
        }

        $order_id->total_price = $total;
        $order_id->update();

        Alert::success('Success', "Order Updated Successfully");
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $orderItem = OrderItem::find($id);
        $order = Order::where('id', $orderItem->order_id)->first();

        if($order->orderItems->count() <= 1) {
            Alert::error('OOps', "One Product Required Or You can Delete Order");
            return redirect()->route('order.index');
        }
        else{
        $order->total_price = $order->total_price - $orderItem->price;
        $order->update();
        $orderItem->delete();
        }

        Alert::success('Order', "OrderItem deleted successfully");
        return redirect()->route('order.index');
    }
}
