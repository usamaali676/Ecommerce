<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Facades\PayPal;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function placeorder(Request $request)
    {

        $data = [];
        $data['items'] = [];
        $data['invoice_description'] = $request->notes;
        $data['invoice_id'] = 1;

        $data['return_url'] = route('order.payment.success');
        $data['cancel_url'] = route('order.payment.cancel');
        $data['total'] = $request->total_price;


        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data, true);


        return redirect($response['paypal_link']);

        // dd($request->all());
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $order = new Order();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->user_id = Auth::user()->id;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->street_address = $request->address;
        $order->zip = $request->zip;
        $order->total_price = $request->total_price;
        $order->notes = $request->notes;
        $order->status = 0;
        $order->tracking_no = 'Insha'.rand(1111,9999);
        $order->save();


        $cartitem = Cart::where('user_id', Auth::user()->id)->get();
        foreach($cartitem as $item)
        {
            $subtotal = $item->product->price * $item->prod_qty;
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $subtotal,
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        $cartitem = Cart::where('user_id', Auth::user()->id)->get();
        Cart::destroy($cartitem);
        Alert::success('Success', "Order Placed Successfully");
        return redirect()->route('fronthome');
    }

    public function index()
    {
        $order = Order::all();
        $srno = 1;
        return view('admin.order.index', compact('order', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order.create');
    }
    public function payment_success(){

        Alert::success('Success', "Order Placed Successfully");
        return redirect()->route('fronthome');
    }
    public function payment_cancel(){
        Alert::error('OOps', "Order Placed Successfully");
        return redirect()->route('fronthome');
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
    public function show($id)
    {
        $order = Order::find($id);
        $srno = 1;
        return view('admin.order.show', compact('order', 'srno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $orderitems = OrderItem::where('order_id', $order->id)->get();
        $srno = 1;
        return view('admin.order.edit', compact('order','orderitems', 'srno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $order = Order::find($id);
        $order->update([
        'fname' => $request->fname,
        'lname' => $request->lname,
        'user_id' => Auth::user()->id,
        'email' => $request->email,
        'phone' => $request->phone,
        'country' => $request->country,
        'city' => $request->city,
        'state' => $request->state,
        'street_address' => $request->address,
        'zip' => $request->zip,
        'total_price' => $request->total_price,
        'notes' => $request->notes,
        'status' => $request->status ? 1 : 0 ?? 0,
        'tracking_no' => $request->tracking_no,
        ]);
        Alert::success('Success', "Order Update Successfully");
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $order = Order::find($id);
        $orderitem = Orderitem::where('order_id', $order->id)->get();
        if(isset($orderitem)){
            foreach($orderitem as $item)
            {
                $item->delete();
            }
        }
        $order->delete();
        Alert::success('Success', "Order deleted successfully");
        return redirect()->route('order.index');
    }
}
