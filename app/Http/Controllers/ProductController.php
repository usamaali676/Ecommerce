<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
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
        // dd($request->file('images'));
        // if(isset($request->image)){
        //     dd("work");

        // }
        // else
        // {
        //     dd("dont-work");
        // }


        $request->validate([
            'name' => 'required | unique:products,name',
            'category_id' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->status = $request->status ? 1 : 0 ?? 0;
        $product->save();

        if(isset($request->images)){
            foreach($request->file('images') as $imagefile) {
                $productimage['image'] = GlobalHelper::crm_upload_img( $imagefile, 'products');
                $productimage['prod_id'] = $product->id;
                ProductImage::create($productimage);

            }
        }

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
        $product->update($input);
        if($request->hasFile('images')){
            $old_image = ProductImage::where('prod_id', $product->id)->get();
                if(isset($old_image)){
                    foreach($old_image as $item){
                        $item->delete();
                    }
                }
            foreach($request->file('images') as $imagefile) {
                $prodimg['prod_id'] = $product->id;
                $prodimg['image'] = GlobalHelper::crm_upload_img( $imagefile, 'products');
                ProductImage::create($prodimg);
            }

        }

        Alert::success('Success', "Product updated Successfully");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Product::find($id)->delete();
        Alert::success('Success', "Product deleted Successfully");
        return redirect()->route('product.index');
    }
}
