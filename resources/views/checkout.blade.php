@extends('Frontlayout.master')
@section('css')
<style>
    .hide {
        display: none;
    }
</style>
@endsection
@section('content')
<div class="container checkout-container">
    <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
        <li>
            <a href="{{route('cart')}}">Shopping Cart</a>
        </li>
        <li class="active">
            <a href="{{route('checkout')}}">Checkout</a>
        </li>
        <li class="disabled">
            <a href="#">Order Complete</a>
        </li>
    </ul>
{{--
    <div class="login-form-container">
        <h4>Returning customer?
            <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">Login</button>
        </h4>

        <div id="collapseOne" class="collapse">
            <div class="login-section feature-box">
                <div class="feature-box-content">
                    <form action="#" id="login-form">
                        <p>
                            If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing & Shipping section.
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">Username or email <span
                                            class="required">*</span></label>
                                    <input type="email" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">Password <span
                                            class="required">*</span></label>
                                    <input type="password" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn">LOGIN</button>

                        <div class="form-footer mb-1">
                            <div class="custom-control custom-checkbox mb-0 mt-0">
                                <input type="checkbox" class="custom-control-input" id="lost-password" />
                                <label class="custom-control-label mb-0" for="lost-password">Remember
                                    me</label>
                            </div>

                            <a href="forgot-password.html" class="forget-password">Lost your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="checkout-discount">
        <h4>Have a coupon?
            <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">ENTER YOUR CODE</button>
        </h4>

        <div id="collapseTwo" class="collapse">
            <div class="feature-box">
                <div class="feature-box-content">
                    <p>If you have a coupon code, please apply it below.</p>

                    <form action="#">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm w-auto" placeholder="Coupon code" required="" />
                            <div class="input-group-append">
                                <button class="btn btn-sm mt-0" type="submit">
                                    Apply Coupon
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-7">
            <ul class="checkout-steps">
                <li>
                    <h2 class="step-title">Billing details</h2>
                    @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error" style="color: red">{{$error}}</div>
                @endforeach
                @endif

                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

             <form action="{{route('order.placeorder')}}" class="require-validation" method="POST"  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Payment Method</h5>
                                    <div class="paymetn-method d-flex">
                                        <input type="radio" id="stripe" onclick="javascript:yesnoCheck();" name="payment_method" class="pay_method" value="stripe">
                                        <label for="stripe">
                                            <img src="{{asset('assets/images/stripe.png')}}" style="width: 50%" alt="">
                                        </label>
                                    </div>
                                    <div class="paymetn-method d-flex">
                                        <input type="radio" id="paypal" onclick="javascript:yesnoCheck();" name="payment_method" class="pay_method" value="paypal">
                                        <label for="paypal">
                                            <img src="{{asset('assets/images/paypal.png')}}" style="width: 50%" alt="">
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 error form-group hide">
                                        <div class="alert-danger alert">Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-paymentfeilds" id="card-feilds" style="display: none">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name on Card
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input type="text" name="card_name" class="form-control" placeholder="Name on Card"  />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Card Number
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="card_number" class="form-control card-number" placeholder="Card Number"  />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CVV
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input type="text" name="cvv" class="form-control card-cvc" placeholder="CVV" maxlength="3" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Expiration Month
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="expiration_month" class="form-control card-expiry-month" placeholder="MM"  />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Expiration Year
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="expiration_year" class="form-control card-expiry-year" placeholder="YYYY"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First name
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="fname" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name
                                        <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="lname" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Country Name
                                <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="country"  class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> City
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="city" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label> State
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="state" class="form-control" required />
                        </div>
                        <div class="form-group mb-1 pb-2">
                            <label>Street address
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" class="form-control" name="address" placeholder="House number and street name" required />
                        </div>


                        <div class="form-group">
                            <label>Postal Code
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="zip" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Phone <abbr class="required" title="required">*</abbr></label>
                            <input type="tel" name="phone" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Email address
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="email" name="email" class="form-control" required />
                            <input type="hidden" name="total_price" value="{{$total}}">
                        </div>


                        <div class="form-group">
                            <label class="order-comments">Order notes (optional)</label>
                            <textarea class="form-control" name="notes" placeholder="Notes about your order, e.g. special notes for delivery." required></textarea>
                        </div>

                        </li>
                    </ul>
                </div>
                <!-- End .col-lg-8 -->

                <div class="col-lg-5">
                    <div class="order-summary">
                        <h3>YOUR ORDER</h3>

                        <table class="table table-mini-cart">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartitem as $item)
                                    <tr>
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                {{$item->product->name}} ×
                                                <span class="product-qty">{{$item->prod_qty}}</span>
                                            </h3>
                                        </td>
                                        @php
                                            $prod_price = $item->product->price * $item->prod_qty;
                                        @endphp

                                        <td class="price-col">
                                            <span>£{{$prod_price}}</span>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <td>
                                        <h4>Subtotal</h4>
                                    </td>

                                    <td class="price-col">
                                        <span>£{{$total}}</span>
                                    </td>
                                </tr>
                                {{-- <tr class="order-shipping">
                                    <td class="text-left" colspan="2">
                                        <h4 class="m-b-sm">Shipping</h4>

                                        <div class="form-group form-group-custom-control">
                                            <div class="custom-control custom-radio d-flex">
                                                <input type="radio" class="custom-control-input" name="radio" checked />
                                                <label class="custom-control-label">Local Pickup</label>
                                            </div>
                                            <!-- End .custom-checkbox -->
                                        </div>
                                        <!-- End .form-group -->

                                        <div class="form-group form-group-custom-control mb-0">
                                            <div class="custom-control custom-radio d-flex mb-0">
                                                <input type="radio" name="radio" class="custom-control-input">
                                                <label class="custom-control-label">Flat Rate</label>
                                            </div>
                                            <!-- End .custom-checkbox -->
                                        </div>
                                        <!-- End .form-group -->
                                    </td>

                                </tr> --}}

                                <tr class="order-total">
                                    <td>
                                        <h4>Total</h4>
                                    </td>
                                    <td>
                                        <b class="total-price"><span>£{{$total}}</span></b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        {{-- <div class="payment-methods">
                            <h4 class="">Payment methods</h4>
                            <div class="info-box p-0">
                                <p>
                                    <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a>
                                </p>
                            </div>
                        </div> --}}

                <button type="submit" class="btn btn-dark btn-place-order" @if ($total < 1) disabled @endif >
                    Place order
                </button>
            </form>
            </div>
            <!-- End .cart-summary -->
        </div>
        <!-- End .col-lg-4 -->
    </div>
    <!-- End .row -->
</div>
<!-- End .container -->

@endsection
@section('js')
<script>
     function yesnoCheck() {
        if (document.getElementById('stripe').checked) {
           document.getElementById('card-feilds').style.display = 'block';
        } else {
           document.getElementById('card-feilds').style.display = 'none';
        }
    }
</script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

$(function() {

    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/


    var $form = $(".require-validation");


    $('form.require-validation').bind('submit', function(e) {
        var paymentmethod = $('input[name="payment_method"]:checked').val();
        // alert(paymentmethod);

    if (paymentmethod == "stripe"){
        // alert("stripe");

        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });

        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }

    }
    else {
        $form.get(0).submit();
    }

    });

    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];

            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>

@endsection
