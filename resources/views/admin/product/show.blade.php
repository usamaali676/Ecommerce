@extends('layouts.app')
@section('admincontent')
<section class="profile">
    <div class="row profile-overview">
        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->

                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Product Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Product Name</div>
                                <div class="col-lg-9 col-md-8">{{$product->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Category</div>
                                <div class="col-lg-9 col-md-8">{{$product->category->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Price</div>
                                <div class="col-lg-9 col-md-8">{{$product->price}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Quantity</div>
                                <div class="col-lg-9 col-md-8">{{$product->qty}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Status</div>
                                @if($product->status == 1)
                                <div class="col-lg-9 col-md-8">Active</div>
                                @else
                                <div class="col-lg-9 col-md-8">Deactive</div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Description</div>
                                <div class="col-lg-9 col-md-8">{!! $product->description !!}</div>
                            </div>




                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>

        <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{asset('images/products')}}/{{$product->image}}" alt="Profile" >
              </div>
            </div>

          </div>
    </div>
</section>

@endsection
