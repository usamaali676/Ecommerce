@extends('layouts.app')
@section('admincontent')

<div class="pagetitle">
    <h1>Edit Ordered Item</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Ordered Item</li>
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
                <form action="{{route('orderitem.update', $orderitem->id)}}" method="POST" enctype="multipart/form-data"  class="row g-3" >
                    @csrf
                    <div class="col-md-6">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="fname" value="{{$orderitem->products->name}}"  class="form-control" id="name" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Quantity</label>
                        <input type="text" name="qty" value="{{$orderitem->qty}}"  class="form-control" id="name">
                    </div>

                  <div >
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form><!-- Vertical Form -->

              </div>
            </div>
        </div>


    </div>
  </section>

@endsection
