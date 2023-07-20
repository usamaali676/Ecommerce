@extends('Frontlayout.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}">
@endsection
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('fronthome')}}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
        </ol>
    </nav>
    <div class="product-single-container product-single-default">
        {{-- <div class="cart-message d-none">
            <strong class="single-cart-notice">“{{$product->name}}”</strong>
            <span>has been added to your cart.</span>
        </div> --}}

        <div class="row">
            <div class="col-lg-5 col-md-6 product-single-gallery">
                <div class="product-slider-container" id="final">
                    <div class="label-group">
                        <div class="product-label label-hot">HOT</div>
                        <!---->
                    </div>

                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover" id="prod_img">
                        @foreach ($product->prodimage as $img)
                        <div class="product-item">
                            <img class="product-single-image" src="{{asset('images/products')}}/{{$img->image}}"
                                data-zoom-image="{{asset('images/products')}}/{{$img->image}}" width="468" height="468"
                                alt="product" />
                        </div>
                        @endforeach
                    </div>

                    <!-- End .product-single-carousel -->
                    <span class="prod-full-screen">
                        <i class="icon-plus"></i>
                    </span>
                </div>

                <div class="prod-thumbnail owl-dots" id="dot-owl">
                    @foreach ($product->prodimage as $img)
                    <div class="owl-dot">
                        <img src="{{asset('images/products')}}/{{$img->image}}" width="110" height="110"
                            alt="product-thumbnail" />
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- End .product-single-gallery -->

            <div class="col-lg-7 col-md-6 product-single-details">
                <h1 class="product-title">{{$product->name}}</h1>

                @php
                $starstotal = $averageRating * 20 ;
                @endphp


                @if ($averageRating != 0)
                <div class="ratings-container">
                    <div class="product-ratings">
                        <span class="ratings" style="width:
                        {{$starstotal}}%"></span>
                        <!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <!-- End .product-ratings -->

                    <a href="#" class="rating-link">( {{$averageRating}} Reviews )</a>
                </div>
                <!-- End .ratings-container -->

                @else

                <div class="ratings-container">
                    <!-- End .product-ratings -->

                    <a href="#" class="rating-link">( No Reviews )</a>
                </div>

                @endif


                <hr class="short-divider">

                <div class="price-box">
                    {{-- <span class="old-price">$1,999.00</span> --}}
                    <span class="new-price" id="prod-price">£{{$product->price}}</span>
                </div>
                <!-- End .price-box -->

                @if (isset($color_variant))
                <h5 style="margin-bottom: 5px;">Color:</h5>
                @endif

                <div class="d-flex">
                    @foreach ($color_variant as $color)
                    <a href="javascript:;" class="variants" id="{{$color->id}}">
                        <div class="variant-box">
                            @foreach ($color->variantimage as $img)
                            @if ($loop->first)
                            <img src="{{asset('images/products')}}/{{$img->image}}" alt="" style="width: 70px
                            ">
                            @break
                            @endif
                            @endforeach
                            <p>{{$color->name}}</p>
                        </div>
                    </a>
                    @endforeach
                </div>

                @if (isset($storage_variant))
                <h5 style="margin: 10px 0px;">Storage:</h5>
                @endif
                <div class="d-flex">
                    @foreach ($storage_variant as $storage)
                    <a href="javascript:;" class="variants" id="{{$storage->id}}">
                        <div class="storage">
                            <p>{{$storage->name}}</p>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="product-desc">
                    <p>
                        {!! $product->description !!}
                    </p>
                </div>
                <!-- End .product-desc -->


                <div class="product-action">
                    {{-- <div class="price-box product-filtered-price">
                        <del class="old-price"><span>$286.00</span></del>
                        <span class="product-price">$245.00</span>
                    </div> --}}

                    <div class="product-single-qty">
                        <input id="prod_id" type="hidden" name="prod_id" value="{{$product->id}}">
                        <input id="qty" class="horizontal-quantity form-control" name="qty" type="text">
                    </div>
                    <!-- End .product-single-qty -->

                    <a type="submit" href="javascript:;" class="btn btn-dark add-cart mr-2 addToCartButton"
                        title="Add to Cart">Add to
                        Cart</a>

                    {{-- <a href="{{route('cart')}}" class="btn btn-gray view-cart d-none">View cart</a> --}}
                </div>
                <!-- End .product-action -->

                <hr class="divider mb-0 mt-0">

                <div class="product-single-share mb-2">
                    <label class="sr-only">Share:</label>

                    <div class="social-icons mr-2">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                            title="Facebook"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                            title="Linkedin"></a>
                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                            title="Google +"></a>
                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                    </div>
                    <!-- End .social-icons -->


                </div>
                <!-- End .product single-share -->
            </div>
            <!-- End .product-single-details -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .product-single-container -->

    <div class="product-single-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                    role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content"
                    role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews
                    ({{$product->reviews->count()}})</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                aria-labelledby="product-tab-desc">
                <div class="product-desc-content">
                    <p class="mb-2">
                        {!! $product->description !!}
                    </p>
                </div>
                <!-- End .product-desc-content -->
            </div>
            <!-- End .tab-pane -->

            <!-- End .tab-pane -->

            <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                aria-labelledby="product-tab-reviews">

                <div class="product-reviews-content">
                    <h3 class="reviews-title">{{$product->reviews->count()}} review for {{$product->name}}</h3>
                    @foreach ($product->reviews as $review)
                    <div class="comment-list">
                        <div class="comments">
                            <figure class="img-thumbnail">
                                <img src="{{asset('assets/images/user-icon.png')}}" alt="author" width="80" height="80">
                            </figure>

                            <div class="comment-block">
                                <div class="comment-header">
                                    <div class="comment-arrow"></div>

                                    <div class="ratings-container float-sm-right">
                                        <div class="product-ratings">
                                            <span class="ratings" style="
                                                        @switch($review->stars)
                                                            @case(1)
                                                            width:20%
                                                            @break
                                                            @case(2)
                                                            width:40%
                                                            @break
                                                            @case(3)
                                                            width:60%
                                                            @break
                                                            @case(4)
                                                            width:80%
                                                            @break
                                                            @case(5)
                                                            width:100%
                                                            @break
                                                        @endswitch
                                                        "></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>

                                    <span class="comment-by">
                                        <strong>{{$review->user->name}}</strong> –
                                        {{$review->created_at->format('d-M-Y')}}
                                    </span>
                                </div>

                                <div class="comment-content">
                                    <p>{{$review->text}}</p>
                                </div>
                                @if (Auth::check())
                                @if (Auth::user()->role_id == 1)
                                <a href="{{route('review-delete', $review->id)}}">
                                    <p style="float: right">Delete</p>
                                </a>
                                @endif
                                @endif

                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="divider"></div>
                    @if (Auth::check())
                    <div class="add-product-review">
                        <h3 class="review-title">Add a review</h3>

                        <form action="{{route('add-review')}}" method="POST" class="comment-form m-0">
                            @csrf
                            <input type="hidden" name="prod_id" value="{{$product->id}}">
                            <div class="rating-form">
                                <label for="rating">Your rating <span class="required">*</span></label>
                                <span class="rating-stars">
                                    <a class="star-1" href="#">1</a>
                                    <a class="star-2" href="#">2</a>
                                    <a class="star-3" href="#">3</a>
                                    <a class="star-4" href="#">4</a>
                                    <a class="star-5" href="#">5</a>
                                </span>

                                <select name="rating" id="rating" required="" style="display: none;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Your review <span class="required">*</span></label>
                                <textarea cols="5" rows="6" name="text" class="form-control form-control-sm"></textarea>
                            </div>
                            <!-- End .form-group -->




                            <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                        </form>
                    </div>
                    @else
                    <div class="product-reviews-content">
                        <h2>Please Login to Add Review </h2>
                    </div>
                    @endif
                    <!-- End .add-product-review -->
                </div>


                <!-- End .product-reviews-content -->
            </div>
            <!-- End .tab-pane -->
        </div>
        <!-- End .tab-content -->
    </div>
    <!-- End .product-single-tabs -->

    <div class="products-section pt-0 pb-2">
        <h2 class="section-title pb-3">Related Products</h2>

        <div class="products-slider owl-carousel owl-theme dots-top dots-small">
            @foreach ($relatedprod as $item)
            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInUpShorter"
                data-animation-delay="200" data-animation-duration="1000">
                <figure class="img-effect">
                    <a href="{{route('singleproduct', $item->slug)}}">
                        @foreach ($item->prodimage as $img)
                        @if ($loop->iteration >= 2)
                        <img src="{{asset('images/products')}}/{{$img->image}}" style="width: 300px; height: 300px;"
                            alt="product" />
                        @endif
                        @endforeach
                        {{-- <img src="{{asset('assets/images/demoes/demo2/products/product-1-2.jpg')}}"
                            style=" width:265px; height:265px;" alt="product" /> --}}
                    </a>
                    <div class="label-group">
                        <div class="product-label label-hot">HOT</div>
                    </div>
                    <div class="btn-icon-group">
                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                class="icon-shopping-cart"></i></a>
                    </div>
                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                        View</a>
                </figure>
                <div class="product-details">
                    <div class="category-wrap">
                        <div class="category-list">
                            <a href="#" class="product-category">{{$item->category->name}}</a>
                        </div>
                        {{-- <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                class="icon-heart"></i></a> --}}
                    </div>
                    <h3 class="product-title">
                        <a href="#">{{$item->name}}</a>
                    </h3>
                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:100%"></span>
                            <!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <!-- End .product-ratings -->
                    </div>
                    <!-- End .product-container -->
                    <div class="price-box">
                        {{-- <span class="old-price">$59.00</span> --}}
                        <span class="product-price">£{{$item->price}}</span>
                    </div>
                    <!-- End .price-box -->
                </div>
                <!-- End .product-details -->
            </div>
            @endforeach


        </div>
        <!-- End .products-slider -->
    </div>
    <!-- End .products-section -->

    <hr class="mt-0 m-b-5" />

</div>
<!-- End .container -->
@endsection
@section('js')

<script src="{{asset('assets/js/sweetalert.all.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.addToCartButton').click(function (e) {
            var product_id = $("#prod_id").val();
            var product_qty = $("#qty").val();
            // alert(product_qty);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{route('addcart')}}",
                type: "POST",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty
                },
                success: function (response) {
                    window.location.reload();
                    if (response.status === "Please Login First...") {

                        swal("Oops...", `${response.status}`, "error");
                        window.location.href = '/login';
                    }
                    else if (response.status === "Already In Cart") {
                        swal("Oops...", `${response.status}`, "error");
                    }
                    else {
                        swal("Done!", `${response.status}`, "success");
                    }

                }
            })
        })


        // $('.increment-btn').click(function (e) {
        //     e.preventDefault();

        //     var inc_value = $('.quantity-input').val();
        //     var value = parseInt(inc_value, 10);
        //     value = isNaN(value) ? 0 : value;
        //     if(value < 10)
        //     {
        //         value++;
        //         $('.quantity-input').val(value);
        //     }
        // })
        // $('.decrement-btn').click(function (e) {
        //     e.preventDefault();
        //     console.log('hello')

        //     var inc_value = $('.quantity-input').val();
        //     var value = parseInt(inc_value, 10);
        //     value = isNaN(value) ? 0 : value;
        //     if(value > 1)
        //     {
        //         value--;
        //         $('.quantity-input').val(value);
        //     }
        // })
    })
</script>

<script>
    $(document).ready(function () {
        $(".variants").click(function (e) {
            var variant_id = $(this).attr("id")

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('variant')}}",
                type: "get",
                data: {
                    'variant_id': variant_id,
                },
                success: function (data) {
                    var variant = data.variant;
                    console.log(variant);
                    $('#prod-price').html("£" + variant.price);
                    var productImages = variant.variantimage;
                    console.log(productImages);
                    if (productImages.length > 0) {

                            temp = '';

                            productImages.forEach(function(img) {
                            temp += `

                                    <div class="product-item">
                                        <img class="product-single-image" src="{{asset('images/products')}}/${img.image}" data-zoom-image="assets/images/products/zoom/product-1-big.jpg" width="468" height="468" alt="product" />
                                    </div>`;
                        });
                        $('#prod_img').html(temp);


                        var dotowl = '';
                        productImages.forEach(function(img) {
                        dotowl += `<div class="owl-dot">
                            <img src="{{asset('images/products')}}/${img.image}" width="110" height="110" alt="product-thumbnail" />
                        </div>`;
                        })
                        $('#dot-owl').html(dotowl);




                        // var script = document.createElement('script');
                        // script.src = '/assets/js/main.min.js'; // Replace with the correct path to custom.js
                        // script.type = 'text/javascript';

                        // console.log(script);

                        // // Append the script to the document body to load it
                        // document.body.appendChild(script);





                        // $('#prod_img').owlCarousel({
                        //     items: 1,
                        //     loop: true,
                        //     autoplay: true,
                        //     nav: true,
                        //     dots: false
                        //     // Add more options as needed
                        // });

















                    }




                }

            })
            // alert(variant_id);
        })
    })
</script>
@endsection
