@extends('layouts.app')
@section('admincontent')

<div class="pagetitle">
    <h1>Edit Product</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit User</h5>

                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="error" style="color: red">{{$error}}</div>
                    @endforeach
                    @endif

                    <!-- Vertical Form -->
                    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputrole" class="form-label">Category</label>
                            <select id="inputrole" name="category_id" class="form-select">
                                @if ($selectedcategory != NULL)
                                <option value="{{$selectedcategory->id}}" selected>{{$selectedcategory->name}}</option>
                                @else
                                <option selected>Please Select</option>
                                @endif
                                @foreach ($category as $item)
                                @if ($item->id != $selectedcategory->id)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Slug</label>
                            <input type="text" name="slug" value="{{$product->slug}}" class="form-control"
                                id="inputEmail5">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Price</label>
                            <input type="text" name="price" value="{{$product->price}}" class="form-control"
                                id="inputPassword5">
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">Image</label>
                            @foreach ($product->prodimage as $item)
                            <img src="{{asset('images/products')}}/{{$item->image}}" style="width: 100px; height: 100px"
                                alt="">
                            <a href="{{route('product.deleteimage', $item->id)}}"><span
                                    style=" position: relative; z-index: 1; left: -3%; top: -28%; padding: 2px 8px; background: #fff; border-radius: 50px; border: 1px solid #000;">x</span></a>
                            @endforeach
                            <br>
                            <input class="form-control" name="images[]" type="file" id="formFile" multiple="multiple"
                                style="margin-top: 20px">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="ckeditor form-control"
                                id="editor">{!! $product->description !!}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
                        </div>
                        <div class="col-12" style="margin: 25px 0px;">
                            {{-- <p>Status</p> --}}
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                <input class="form-check-input" name="status" type="checkbox"
                                    id="flexSwitchCheckDefault" @if ($product->status == 1)
                                checked
                                @else

                                @endif>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>


        </div>

        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Products Variants</h5>
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($variants as $item)
                            <tr style="vertical-align: middle">
                                <th >{{$srno++}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->stock}}</td>
                                <td>£{{$item->price}}</td>
                                <td>
                                    <a href="{{route('variant.edit',$item->id)}}" type="button" class="btn btn-warning" style="color: #fff"><i class="bx bxs-pencil"></i></a>
                                    <a onclick="return confirm('Are you sure?');" href="{{route('variant.delete',$item->id)}}"  type="button" class="btn btn-danger"><i class="bx bx-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                      </table>
                </div>

              </div>
            </div>
        </div>

    </div>

</section>

@endsection
