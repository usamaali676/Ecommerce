@extends('layouts.app')
@section('admincontent')

<div class="pagetitle">
    <h1>Edit Order</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Order</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Order</h5>

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error" style="color: red">{{$error}}</div>
                @endforeach
                @endif

                <!-- Vertical Form -->
                <form action="{{route('order.update', $order->id)}}" method="POST" enctype="multipart/form-data"  class="row g-3" >
                    @csrf
                    <div class="col-md-6">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" name="fname" value="{{$order->fname}}"  class="form-control" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Last Name</label>
                        <input type="text" name="lname" value="{{$order->lname}}"  class="form-control" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Email</label>
                        <input type="text" name="email" value="{{$order->email}}" class="form-control" id="inputEmail5">
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{$order->phone}}" class="form-control" >
                    </div>
                    <div class="col-12">
                        <label for="image" class="form-label">Country</label>
                        <input type="text" name="country" value="{{$order->country}}" class="form-control" >
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">City</label>
                        <input type="text" name="city" value="{{$order->city}}" class="form-control" >
                    </div>

                    <div class="col-12">
                        <label  class="form-label">State</label>
                        <input type="text" name="state" value="{{$order->state}}" class="form-control" >
                    </div>

                    <div class="col-12">
                        <label  class="form-label">Street Address</label>
                        <input type="text" name="address" value="{{$order->street_address}}" class="form-control" >
                    </div>
                    <div class="col-12">
                        <label  class="form-label">Zip</label>
                        <input type="text" class="form-control" name="zip" value="{{$order->zip}}">
                    </div>

                    <div class="col-12">
                        <label  class="form-label">Total</label>
                        <input type="text" class="form-control" name="total_price" value="{{$order->total_price}}">
                    </div>

                    <div class="col-12">
                        <label  class="form-label">Tracking Number</label>
                        <input type="text" class="form-control" name="tracking_no" value="{{$order->tracking_no}}">
                    </div>

                    <div class="col-12">
                        <label  class="form-label">Note</label>
                        <textarea name="notes" class="form-control ckeditor" >{!! $order->notes !!}</textarea>
                    </div>
                    <div class="col-12" style="margin: 25px 0px;">
                        {{-- <p>Status</p> --}}
                        <div class="form-check form-switch" >
                            <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                            <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault" @if ($order->status == 1)
                            checked
                            @else

                            @endif>

                        </div>
                    </div>
                  <div >
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
                <h5 class="card-title">Orderd Products</h5>
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($orderitems as $item)
                            <tr style="vertical-align: middle">
                                <th >{{$srno++}}</th>
                                <td>{{$item->products->name}}</td>
                                <td>{{$item->qty}}</td>
                                <td>${{$item->price}}</td>
                                <td>
                                    @foreach ($item->products->prodimage as $img)
                                    @if ($loop->first >= 2)
                                        <img src="{{asset('images/products')}}/{{$img->image}}" width="100px"  alt="product" />
                                    @endif
                                    @endforeach
                                    {{-- <img src="{{asset('images/products')}}/{{$item->products->image}}" style="width: 100px" alt=""> --}}
                                </td>
                                <td>
                                    <a href="{{route('orderitem.edit',$item->id)}}" type="button" class="btn btn-warning" style="color: #fff"><i class="bx bxs-pencil"></i></a>
                                    <a onclick="return confirm('Are you sure?');" href="{{route('orderitem.delete',$item->id)}}"  type="button" class="btn btn-danger"><i class="bx bx-trash"></i></a>
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
