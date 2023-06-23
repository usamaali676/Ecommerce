@extends('Frontlayout.master')
@section('content')
<div class="container">
    <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
        <li class="active">
            <a href="{{route('cart')}}">Shopping Cart</a>
        </li>
        <li>
            <a href="{{route('checkout')}}">Checkout</a>
        </li>
        <li class="disabled">
            <a href="{{route('cart')}}">Order Complete</a>
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-8">
            <div class="cart-table-container">
                <table class="table table-cart">
                    <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col">Product</th>
                            <th class="price-col">Price</th>
                            <th class="qty-col">Quantity</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                    </thead>
                    @php
                        $total = 0;
                    @endphp
                    <tbody>
                        @foreach ($cartItem as $item)
                            <tr class="product-row">
                                <td>
                                    <figure class="product-image-container">
                                        <a href="{{route('singleproduct', $item->product->slug)}}" class="product-image">
                                            @foreach ($item->product->prodimage as $img)
                                                @if ($loop->first)
                                                    <img src="{{asset('images/products')}}/{{$img->image}}" width="80" height="80" alt="product" />
                                                @endif
                                            @endforeach
                                        </a>

                                            <input id="prod_id" type="hidden" value="{{$item->prod_id}}" name="prod_id">
                                        <a href="#" class="btn-remove icon-cancel deleteCartItem" id="{{$item->prod_id}}" title="Remove Product"></a>

                                    </figure>
                                </td>
                                <td class="product-col">
                                    <h5 class="product-title">
                                        <a href="{{route('singleproduct', $item->product->slug)}}">{{$item->product->name}}</a>
                                    </h5>
                                </td>
                                <td>${{$item->product->price}}</td>
                                <td>
                                    <div class="product-single-qty" id="{{$item->prod_id}}">
                                        <input class="horizontal-quantity form-control quantity_input" value="{{$item->prod_qty}}" type="text">
                                        <input type="hidden" name="prod_id" class="prod_id" value="{{$item->prod_id}}">
                                    </div><!-- End .product-single-qty -->
                                </td>
                                @php

                                $price = $item->product->price;
                                $subtotal = $price * $item->prod_qty;

                                $total += $subtotal;
                                @endphp
                                <td class="text-right"><span class="subtotal-price">${{$subtotal}}</span></td>
                            </tr>
                        @endforeach

                    </tbody>

                    @php
                        // dd($total);
                    @endphp

                    <tfoot>
                        <tr>
                            <td colspan="5" class="clearfix">
                                {{-- <div class="float-left">
                                    <div class="cart-discount">
                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Coupon Code" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-sm" type="submit">Apply
                                                        Coupon</button>
                                                </div>
                                            </div><!-- End .input-group -->
                                        </form>
                                    </div>
                                </div> --}}
                                <!-- End .float-left -->

                                {{-- <div class="float-right">
                                    <button type="submit" class="btn btn-shop btn-update-cart">
                                        Update Cart
                                    </button>
                                </div> --}}
                                <!-- End .float-right -->
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- End .cart-table-container -->
        </div><!-- End .col-lg-8 -->

        <div class="col-lg-4">
            <div class="cart-summary">
                <h3>CART TOTALS</h3>


                <table class="table table-totals">
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td>${{$total}}</td>
                        </tr>

                    </tbody>

                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td>${{$total}}</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout-methods">
                    <a href="{{route('checkout')}}" class="btn btn-block btn-dark">Proceed to Checkout
                        <i class="fa fa-arrow-right"></i></a>
                </div>
            </div><!-- End .cart-summary -->
        </div><!-- End .col-lg-4 -->
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-6"></div><!-- margin -->
@endsection

@section('js')
{{-- <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>



        $('.product-single-qty').click( function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id  = $(this).attr('id');
            var prod_qty  = $(this).closest('.product-single-qty').find('.quantity_input').val();


            $.ajax({
                url : "{{route('updateCart')}}",
                type : "POST",
                data : {
                    'prod_id': prod_id,
                    'prod_qty': prod_qty
                },
                success: function(response)
                {
                    window.location.reload();
                }
            })
        })
</script>

@endsection
