<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerDashboard extends Controller
{
    public function index()
    {
        $order = Order::where('user_id', Auth::user()->id)->get();
        $srno = 1;
        $user = Auth::user();
        return view('customer.dashboard', compact('order', 'srno','user'));
    }
    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users,email,'.$id,
            'old_password' => 'required',
            'password' => 'required| different:password | confirmed | min:8',
        ]);
        $user = User::find($id);
        if (Hash::check($request->password, $user->password)) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            Alert::success('Success', "User updated successfully");
            return redirect()->route('customerdashboard');
        }
        else
        {
            Alert::error('OOps', "Password does not match");
            return redirect()->route('customerdashboard');
        }

    }
}
