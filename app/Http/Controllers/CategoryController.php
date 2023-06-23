<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $category = Category::all();
        $srno = 1;
        return view('admin.category.index', compact('category','srno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:categories,name',
            'slug' => 'required',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        Alert::success('Success',"Category created successfully");
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | unique:categories,name,' .$id ,
            'slug' => 'required'
        ]);
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        Alert::success('Success', "Category updated successfully");
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        Alert::success('Success', "Category deleted successfully");
        return redirect()->route('category.index');

    }
}
