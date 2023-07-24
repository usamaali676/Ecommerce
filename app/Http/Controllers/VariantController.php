<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantImages;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VariantController extends Controller
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
    public function create($id)
    {
        $product = Product::find($id);
        return view('admin.product.add_variant', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:variants,name',
            'type' => 'required',
             'price' => 'required',
             'stock' => 'required'
        ]);
        $variant = new Variant();
        $variant->name = $request->name;
        $variant->prod_id =  $request->prod_id;
        $variant->type = $request->type;
        $variant->price = $request->price;
        $variant->stock = $request->stock;
        $variant->save();

        if($request->type == "Color")
        {
            if(isset($request->images)){
                foreach($request->file('images') as $imagefile) {
                    $variantimage['image'] = GlobalHelper::crm_upload_img( $imagefile, 'products');
                    $variantimage['variant_id'] = $variant->id;
                    VariantImages::create($variantimage);

                }
            }

        }

        Alert::success('success', "Variant Added Successfully");
        return redirect()->route('product.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Variant $variant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $variant = Variant::find($id);
        // dd($variant);
        return view('admin.product.edit_variant', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | unique:variants,name,'.$id,
            'type' => 'required',
             'price' => 'required',
             'stock' => 'required'
        ]);
        $variant = Variant::find($id);
        $input['name'] = $request->name;
        $input['type'] = $request->type;
        $input['price'] = $request->price;
        $input['stock'] = $request->stock;
        $variant->update($input);
        if($request->type == "Color")
        {
            if(isset($request->images)){
                foreach($request->file('images') as $imagefile) {
                    $variantimage['image'] = GlobalHelper::crm_upload_img( $imagefile, 'products');
                    $variantimage['variant_id'] = $variant->id;
                    VariantImages::create($variantimage);

                }
            }

        }
        Alert::success('Success', "Variant Updated Successfully");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $variant = Variant::find($id);
        $variant->delete();
        Alert::success('Success', "Variant Removed Successfully");
        return redirect()->route('product.index');
    }

    public function deleteimage($id)
    {
        $variantimage = VariantImages::where('id',$id)->first();
        GlobalHelper::delete_img($variantimage->image , 'products');
        $variantimage->delete();
        Alert::success('Success', "Variant Image Removed Successfully!");
        return redirect()->back();
    }
}
