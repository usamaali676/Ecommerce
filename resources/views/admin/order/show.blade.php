@extends('layouts.app')
@section('admincontent')
<section class="profile">
    <div class="row profile-overview">
        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->

                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Order Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">User Name</div>
                                <div class="col-lg-9 col-md-8">{{$order->fname}} {{$order->lname}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{$order->email}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8">{{$order->phone}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Country</div>
                                <div class="col-lg-9 col-md-8">{{$order->country}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">State</div>
                                <div class="col-lg-9 col-md-8">{{$order->state}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Street Address</div>
                                <div class="col-lg-9 col-md-8">{{ $order->street_address }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Postal Code</div>
                                <div class="col-lg-9 col-md-8">{{ $order->zip }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Tracking Number</div>
                                <div class="col-lg-9 col-md-8">{{ $order->tracking_no }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Order Note</div>
                                <div class="col-lg-9 col-md-8">{{ $order->notes }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Tolal</div>
                                <div class="col-lg-9 col-md-8">{{ $order->total_price }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Status</div>
                                @if($order->status == 1)
                                <div class="col-lg-9 col-md-8">Complete</div>
                                @else
                                <div class="col-lg-9 col-md-8">Pending</div>
                                @endif

                            </div>


                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>

        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->

                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Order Items</h5>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->orderItems as $item)
                                        <tr style="vertical-align: middle">
                                            <th >{{$srno++}}</th>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>${{$item->price}}</td>
                                            <td><img src="{{asset('images/products')}}/{{$item->products->image}}" style="width: 100px" alt=""></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                  </table>
                            </div>
                            {{-- <div class="row">
                                <div class="col-lg-3 col-md-4 label ">User Name</div>
                                <div class="col-lg-9 col-md-8">{{$order->fname}} {{$order->lname}}</div>
                            </div> --}}


                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>


    </div>
</section>

@endsection
