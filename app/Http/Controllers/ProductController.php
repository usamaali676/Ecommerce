<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $srno = 1;
        return view('admin.product.index', compact('product', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:products,name',
            'category_id' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'image' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->hasFile('image')){
           $product->image = GlobalHelper::crm_upload_img($request->file('image'), 'products');
        }
        $product->qty = $request->qty;
        $product->status = $request->status ? 1 : 0 ?? 0;
        $product->save();

        Alert::success('Success', "Product created Successfully");
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $selectedcategory = Category::where('id', $product->category_id)->first();
        $category = Category::all();
        return view('admin.product.edit', compact('product','selectedcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | unique:products,name,'.$id,
            'category_id' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);
        $product = Product::find($id);
        $input['name'] = $request->name;
        $input['category_id	'] = $request->category_id;
        $input['slug'] = $request->slug;
        $input['price'] = $request->price;
        $input['description'] = $request->description;
        $input['qty'] = $request->qty;
        $input['status'] = $request->status ? 1 : 0 ?? 0;
        if($request->hasFile('image')){
            $old_image = $product->image;
            if(asset($old_image))
            {
                GlobalHelper::delete_img($old_image,'products');
                $input['image'] = GlobalHelper::crm_upload_img($request->file('image'), 'products');
            }
            else{
                $input['image'] = GlobalHelper::crm_upload_img($request->file('image'), 'products');
            }
        }
        $product->update($input);
        Alert::success('Success', "Product updated Successfully");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        Alert::success('Success', "Product deleted Successfully");
        return redirect()->route('product.index');
    }
}
