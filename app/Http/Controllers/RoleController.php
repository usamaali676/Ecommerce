<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $role = Role::all();
        $srno = 1;
        return view('admin.role.index', compact('role', 'srno'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required| unique:roles,name'
        ]);
        Role::updateOrCreate([
            'name' => $request->name,
        ]);
        Alert::success('success', "Role created successfully" );
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        // $role[] = [1, 2, 3, 4, 5, 6, 7];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required| unique:roles,name,'.$id,
        ]);
        $role = Role::find($id);
        $role->update([
            'name' => $request->name,
        ]);
        Alert::success('Success', "Role updated successfully");
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $role = Role::find($id);
        if($role->id == 1)
        {
            Alert::error('OOps', "You Can't Delete this Role");
            return redirect()->route('role.index');
        }
        else{
            $role->delete();
            Alert::success('Success', "Role deleted successfully");
            return redirect()->route('role.index');
        }
    }
}
