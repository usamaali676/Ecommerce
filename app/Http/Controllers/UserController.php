<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        $srno = 1;
        return view('admin.user.index', compact('user', 'srno', ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:users,name',
            'role_id' => 'required',
            'email' => 'required | email',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Alert::success('Success', "User created successfully");
        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::all();
        $selectedrole = Role::where('id', $user->role_id)->first();
        return view('admin.user.edit', compact('user','role','selectedrole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | unique:users,name,' .$id,
            'role_id' => 'required',
            'email' => 'required | email',
        ]);
        $user = User::find($id);
        if($request->password != NULL)
        {
        $user->update([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        }
        else{
            $user->update([
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
            ]);
        }
        Alert::success('Success', "User updated successfully");
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        $user = User::find($id);
        if($user->count() <= 1)
        {
            Alert::error('OOps', "At least one user Requires");
            return redirect()->route('user.index');
        }
        else{
            $user->delete();
            Alert::success('Success', "User deleted successfully");
            return redirect()->route('user.index');
        }
    }
}
