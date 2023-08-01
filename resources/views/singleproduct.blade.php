@extends('Frontlayout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> --}}
    {{-- <link rel='stylesheet' href="https://cdn.jsdelivr.net/npm/xzoom@1.0.14/src/xzoom.css">
    <link rel='stylesheet' href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css" rel="stylesheet" />

    <style>

    </style>
    @endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('fronthome') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item"><a href="#">{{$product->category->name}}</a></li>
                <li class="breadcrumb-item"><a href="#">{{$product->name}}</a></li>
            </ol>
        </nav>
        <div class="product-single-container product-single-default">
            {{-- <div class="cart-message d-none">
            <strong class="single-cart-notice">“{{$product->name}}”</strong>
            <span>has been added to your cart.</span>
        </div> --}}

            <div class="row">
                <input type="hidden" id="prod_id" value="{{$product->id}}">
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    <div class="product-slider-container" id="final">
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <!---->
                        </div>
                        <div id="prod_img">
                            <div class="your-class" >

                                @foreach ($product->prodimage as $img)
                                    {{-- <div id="lens"></div> --}}
                                        <div class="product-item" style="width: 300px">
                                            <img class="product-single-image"
                                                src="{{ asset('images/products') }}/{{ $img->image }}"
                                                data-zoom-image="{{ asset('images/products') }}/{{ $img->image }}"
                                                width="468" height="468" alt="product" />
                                        </div>
                                        {{-- <div class="xzoom-container">
                                            <a data-fancybox-trigger="gallery" href="javascript:;">
                                                <img class="xzoom" id="xzoom-default" src="{{ asset('images/products') }}/{{ $img->image }}"
                                                    xoriginal="{{ asset('images/products') }}/{{ $img->image }}" />
                                            </a>
                                        </div> --}}

                                    @endforeach
                            </div>
                        </div>
                        {{-- <div id="result"></div> --}}


                    <div id="dotsilck" >
                        <div class="prod-thumbnail silck-dots"  id="silk-dot">
                            @foreach ($product->prodimage as $img)
                                <div class="owl-dot">
                                    <img src="{{ asset('images/products') }}/{{ $img->image }}" width="110" height="110"
                                        alt="product-thumbnail" />
                                </div>
                            @endforeach
                        </div>
                    </div>
{{--
                        <div id="prod_img">
                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                @foreach ($product->prodimage as $img)
                                    <div class="product-item">
                                        <img class="product-single-image"
                                            src="{{ asset('images/products') }}/{{ $img->image }}"
                                            data-zoom-image="{{ asset('images/products') }}/{{ $img->image }}"
                                            width="468" height="468" alt="product" />
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}

                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>

                    {{-- <div class="prod-thumbnail owl-dots" id="dot-owl">
                        @foreach ($product->prodimage as $img)
                            <div class="owl-dot">
                                <img src="{{ asset('images/products') }}/{{ $img->image }}" width="110" height="110"
                                    alt="product-thumbnail" />
                            </div>
                        @endforeach
                    </div> --}}
                </div>
                <!-- End .product-single-gallery -->

                <div class="col-lg-7 col-md-6 product-single-details">
                    <h1 class="product-title">{{ $product->name }} <span id="storagename"></span>  <span id="colorname"></span> </h1>
                    <div class="d-flex">
                        {{-- <span>Purple</span>&nbsp;
                        <span> - 1TB</span>&nbsp; --}}
                    </div>

                    @php
                        $starstotal = $averageRating * 20;
                    @endphp


                    @if ($averageRating != 0)
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:
                        {{ $starstotal }}%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->

                            <a href="#" class="rating-link">( {{ $averageRating }} Reviews )</a>
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
                        <span class="new-price" id="prod-price">£{{ $product->price }}</span>
                    </div>
                    <!-- End .price-box -->

                    <div class="product-action">
                        {{-- <div class="price-box product-filtered-price">
                            <del class="old-price"><span>$286.00</span></del>
                            <span class="product-price">$245.00</span>
                        </div> --}}

                        <div class="product-single-qty">
                            <input id="prod_id" type="hidden" name="prod_id" value="{{ $product->id }}">
                            <input id="qty" class="horizontal-quantity form-control" name="qty" type="text">
                        </div>
                        <!-- End .product-single-qty -->

                        <a type="submit" href="javascript:;" class="btn btn-dark add-cart mr-2 addToCartButton"
                            title="Add to Cart">Add to
                            Cart</a>

                        {{-- <a href="{{route('cart')}}" class="btn btn-gray view-cart d-none">View cart</a> --}}
                    </div>
                    <!-- End .product-action -->




                @if (count($storage_variant) > 0)
                <h5 style="margin: 10px 0px;">Storage:</h5>
            @endif
            <div class="d-flex">
                @foreach ($storage_variant as $storage)
                    <a href="javascript:void(0)" class="storagevariants" id="{{ $storage->id }}">
                        <input type="hidden" name="storage_id" value="" id="storage_id">
                        <div class="storage">
                            <p>{{ $storage->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>


                    @if (count($color_variant) > 0)
                        <h5 style="margin-bottom: 5px;">Color:</h5>
                    @endif

                    <div class="d-flex">
                        {{-- <select name="" id=""> --}}

                            @foreach ($color_variant as $color)
                                <a href="javascript:void(0)" class="variants color_id " id="{{ $color->id }}">
                                    <input type="hidden" name="color_id" value="" id="color_id">
                                    <div class="variant-box colvariant-{{$color->id}} border" style="background-color: {{$color->color}}">

                                         {{-- @foreach ($color->variantimage as $img)
                                            @if ($loop->first)
                                                <img src="{{ asset('images/products') }}/{{ $img->image }}" alt=""
                                                    style="width: 70px
                                ">
                                            @break
                                        @endif
                                    @endforeach --}}
                                    {{-- <p>{{ $color->name }}</p> --}}
                                </div>
                            </a>
                        @endforeach
                    {{-- </select> --}}
                </div>


                {{-- <div class="product-desc">
                    <p>
                        {!! $product->description !!}
                    </p>
                </div> --}}
                <!-- End .product-desc -->




                <hr class="divider mb-0 mt-0">
                <div class="prod-feature">
                    <h2>Advantages of buying on Insha</h2>
                    <ul>
                        <li class="d-flex" ><img src="{{asset('assets/images/icon/Vector.svg')}}" alt=""> &nbsp; &nbsp; Insha connects you to sellers</li>
                        <li class="d-flex" ><img src="{{asset('assets/images/icon/Vector2.svg')}}" alt=""> &nbsp; &nbsp; 12-month warranty + 30-day return</li>
                        <li class="d-flex" ><img src="{{asset('assets/images/icon/Vector3.svg')}}" alt=""> &nbsp; &nbsp; Free 2-5 day delivery</li>
                        <li class="d-flex" ><img src="{{asset('assets/images/icon/Vector4.svg')}}" alt=""> &nbsp; &nbsp; 80%+ battery health on all devices</li>
                        <li class="d-flex" ><img src="{{asset('assets/images/icon/Vector5.svg')}}" alt=""> &nbsp; &nbsp; You protect 5 trees buying this product</li>
                    </ul>
                </div>

                {{-- <div class="product-single-share mb-2">
                    <label class="sr-only">Share:</label>

                    <div class="social-icons mr-2">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                            title="Facebook"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                            title="Twitter"></a>
                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                            title="Linkedin"></a>
                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                            title="Google +"></a>
                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                            title="Mail"></a>
                    </div>
                    <!-- End .social-icons -->


                </div> --}}
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
                    ({{ $product->reviews->count() }})</a>
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
                    <h3 class="reviews-title">{{ $product->reviews->count() }} review for {{ $product->name }}</h3>
                    @foreach ($product->reviews as $review)
                        <div class="comment-list">
                            <div class="comments">
                                <figure class="img-thumbnail">
                                    <img src="{{ asset('assets/images/user-icon.png') }}" alt="author"
                                        width="80" height="80">
                                </figure>

                                <div class="comment-block">
                                    <div class="comment-header">
                                        <div class="comment-arrow"></div>

                                        <div class="ratings-container float-sm-right">
                                            <div class="product-ratings">
                                                <span class="ratings"
                                                    style="
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
                                            <strong>{{ $review->user->name }}</strong> –
                                            {{ $review->created_at->format('d-M-Y') }}
                                        </span>
                                    </div>

                                    <div class="comment-content">
                                        <p>{{ $review->text }}</p>
                                    </div>
                                    @if (Auth::check())
                                        @if (Auth::user()->role_id == 1)
                                            <a href="{{ route('review-delete', $review->id) }}">
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

                            <form action="{{ route('add-review') }}" method="POST" class="comment-form m-0">
                                @csrf
                                <input type="hidden" name="prod_id" value="{{ $product->id }}">
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
                <div class="product-default inner-quickview inner-icon appear-animate"
                    data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                    <figure class="img-effect">
                        <a href="{{ route('singleproduct', $item->slug) }}">
                            @foreach ($item->prodimage as $img)
                                @if ($loop->iteration >= 2)
                                    <img src="{{ asset('images/products') }}/{{ $img->image }}"
                                        style="width: 300px; height: 300px;" alt="product" />
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
                                <a href="#" class="product-category">{{ $item->category->name }}</a>
                            </div>
                            {{-- <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                class="icon-heart"></i></a> --}}
                        </div>
                        <h3 class="product-title">
                            <a href="#">{{ $item->name }}</a>
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
                            <span class="product-price">£{{ $item->price }}</span>
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
<script src="{{ asset('assets/js/sweetalert.all.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src='https://cdn.jsdelivr.net/npm/xzoom@1.0.14/dist/xzoom.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.silck-dots',
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
      });
      var sLightbox = $('.your-class');
        sLightbox.slickLightbox({
            src: 'src',
            itemSelector: '.product-item img',
            caption: 'text'
        });
      $('.silck-dots').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.your-class',
        dots: false,
        centerMode: true,
        focusOnSelect: true
        });
    });
  </script>

<script>
    $(document).ready(function() {
        $('.addToCartButton').click(function(e) {
            var product_id = $("#prod_id").val();
            var product_qty = $("#qty").val();
            var color_id = $("#color_id").val();
            var storage_id = $("#storage_id").val();

            // alert(color_id);
            // alert(storage_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('addcart') }}",
                type: "POST",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                    'color_id' : color_id,
                    'storage_id' : storage_id

                },
                success: function(response) {
                    window.location.reload();
                    if (response.status === "Please Login First...") {

                        swal("Oops...", `${response.status}`, "error");
                        window.location.href = '/login';
                    } else if (response.status === "Already In Cart") {
                        swal("Oops...", `${response.status}`, "error");
                    } else {
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
    $(document).ready(function() {
        $(".variants").click(function(e) {
            var variant_id = $(this).attr("id")
            var prod_id = $('#prod_id').val();

            $(".variants").removeClass("border-active");
            $(this).addClass("border-active");

            // $('[class=colvariant]').addClass("border");
            // $(this).addClass("test");
            // var border_color = document.querySelectorAll('[id=colvariant]');

            // var border = 'hover-border';

            // for (var i = 0; i < border_color.length; ++i) {
            // border_color[i].classList.remove(black_dark);
            // border_color[i].classList.add(white_light);
            // }

            // console.log(prod_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('variant') }}",
                type: "get",
                data: {
                    'variant_id': variant_id,
                    'prod_id' : prod_id,
                },
                success: function(data) {
                    var variant = data.variant;
                    if(variant.type == "Color"){
                        var colorval = variant.id;
                        $("#color_id").val(colorval);
                        // var testval = $("#color_id").val();
                        // console.log(testval);

                        var colorname = variant.name;
                        $("#colorname").html(colorname);
                    }
                    if(variant.type == "Storage"){
                        var storageval = variant.id;
                        $("#storage_id").val(storageval);


                        // var stestval = $("#storage_id").val();
                        // console.log(stestval);
                    }
                    // console.log(variant);

                    $('#prod-price').html("£" + variant.price);
                    var productImages = variant.variantimage;

                    // console.log(productImages);
                    if (productImages.length > 0) {

                        // setTimeout(() => {
                            var temp = '';
                            $('#prod_img').html('<div class="your-class" id="testing"></div>');
                            $("#dotsilck").html('<div class="prod-thumbnail silck-dots" id="silk-dot"></div>');
                            productImages.forEach(function(img) {

                                $("#testing").append(`<div class="product-item">
                                        <img class="product-single-image" src="{{ asset('images/products') }}/${img.image}" data-zoom-image="assets/images/products/zoom/product-1-big.jpg" width="468" height="468" alt="product" />
                                    </div>`);

                                $("#silk-dot").append(` <div class="owl-dot">
                                <img src="{{ asset('images/products') }}/${img.image}" width="110" height="110"
                                    alt="product-thumbnail" />
                                </div>`);
                            });
                            var carsilck = $("#testing");
                            var silk_dot = $("#silk-dot")
                            $(carsilck).slick({
                                speed: 300,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                asNavFor: silk_dot,
                                loop: false,
                            });
                            var sLightbox = $('.your-class');
                             sLightbox.slickLightbox({
                                src: 'src',
                                itemSelector: '.product-item img',
                                caption: 'text'
                            });
                            $(silk_dot).slick({
                                slidesToShow: 3,
                                slidesToScroll: 0,
                                asNavFor: carsilck,
                                dots: false,
                                centerMode: true,
                                focusOnSelect: true
                                });
                                var head = document.head;
                                var link = document.createElement('link');



                                link.type = 'text/css';


                                link.rel = 'stylesheet';


                                link.href = "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css";



                                head.appendChild(link);




                        // }, 5000);






                        // var dotowl = '';
                        // productImages.forEach(function(img) {
                        // dotowl += `<div class="owl-dot">
                        //     <img src="{{ asset('images/products') }}/${img.image}" width="110" height="110" alt="product-thumbnail" />
                        // </div>`;
                        // })
                        // $('#dot-owl').html(dotowl);




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
                //     if (productImages.length > 0) {
                //     $("#dotsilck").append(` <div class="prod-thumbnail silck-dots"  id="silk-dot"></div>`);
                //                 productImages.forEach(function(img) {
                //                     $("#silk-dot").append(` <div class="owl-dot">
                //                 <img src="{{ asset('images/products') }}/${img.image}" width="110" height="110"
                //                     alt="product-thumbnail" />
                //                 </div>`);
                //     })
                // }




                }

            })
            // alert(variant_id);
        })
    })
</script>


<script>
    $(document).ready(function() {
        $(".storagevariants").click(function(e) {
            var variant_id = $(this).attr("id")
            var prod_id = $('#prod_id').val();

            $(".storagevariants").removeClass("border-active");
            $(this).addClass("border-active");

            // $('[class=colvariant]').addClass("border");
            // $(this).addClass("test");
            // var border_color = document.querySelectorAll('[id=colvariant]');

            // var border = 'hover-border';

            // for (var i = 0; i < border_color.length; ++i) {
            // border_color[i].classList.remove(black_dark);
            // border_color[i].classList.add(white_light);
            // }

            // console.log(prod_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('variant') }}",
                type: "get",
                data: {
                    'variant_id': variant_id,
                    'prod_id' : prod_id,
                },
                success: function(data) {
                    var variant = data.variant;
                    if(variant.type == "Color"){
                        var colorval = variant.id;
                        $("#color_id").val(colorval);
                        // var testval = $("#color_id").val();
                        // console.log(testval);
                    }
                    if(variant.type == "Storage"){
                        var storageval = variant.id;
                        $("#storage_id").val(storageval);
                        var storagename = variant.name;
                        $("#storagename").html(storagename);
                        // var stestval = $("#storage_id").val();
                        // console.log(stestval);
                    }
                    // console.log(variant);
                    $('#prod-price').html("£" + variant.price);
                    var productImages = variant.variantimage;

                    // console.log(productImages);
                    if (productImages.length > 0) {

                            productImages.forEach(function(img) {
                                $("#prod_img").append(`<div class="product-item">
                                        <img class="product-single-image" src="{{ asset('images/products') }}/${img.image}" data-zoom-image="assets/images/products/zoom/product-1-big.jpg" width="468" height="468" alt="product" />
                                    </div>`);
                            });






                        // var dotowl = '';
                        // productImages.forEach(function(img) {
                        // dotowl += `<div class="owl-dot">
                        //     <img src="{{ asset('images/products') }}/${img.image}" width="110" height="110" alt="product-thumbnail" />
                        // </div>`;
                        // })
                        // $('#dot-owl').html(dotowl);




                        // var script = document.createElement('script');
                        // script.src = '/assets/js/main.min.js'; // Replace with the correct path to custom.js
                        // script.type = 'text/javascript';

                        // console.log(script);

                        // // Append the script to the document body to load it
                        // document.body.appendChild(script);





















                    }




                }

            })
            // alert(variant_id);
        })
    })
</script>

<script>
// Mousewheel changes amount of zoom

$(document).ready(function() {
  // You can try out different effects here
  $(".xzoom, .xzoom-gallery").xzoom({
    zoomWidth: 400,
    title: true,
    tint: "#333",
    Xoffset: 15
  });
  $(".xzoom2, .xzoom-gallery2").xzoom({
    position: "#xzoom2-id",
    tint: "#ffa200"
  });
  $(".xzoom3, .xzoom-gallery3").xzoom({
    position: "lens",
    lensShape: "circle",
    sourceClass: "xzoom-hidden"
  });
  $(".xzoom4, .xzoom-gallery4").xzoom({ tint: "#006699", Xoffset: 15 });
  $(".xzoom5, .xzoom-gallery5").xzoom({ tint: "#006699", Xoffset: 15 });

  //Integration with hammer.js
  var isTouchSupported = "ontouchstart" in window;

  if (isTouchSupported) {
    //If touch device
    $(".xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5").each(function() {
      var xzoom = $(this).data("xzoom");
      xzoom.eventunbind();
    });

    $(".xzoom, .xzoom2, .xzoom3").each(function() {
      var xzoom = $(this).data("xzoom");
      $(this)
        .hammer()
        .on("tap", function(event) {
          event.pageX = event.gesture.center.pageX;
          event.pageY = event.gesture.center.pageY;
          var s = 1,
            ls;

          xzoom.eventmove = function(element) {
            element.hammer().on("drag", function(event) {
              event.pageX = event.gesture.center.pageX;
              event.pageY = event.gesture.center.pageY;
              xzoom.movezoom(event);
              event.gesture.preventDefault();
            });
          };

          xzoom.eventleave = function(element) {
            element.hammer().on("tap", function(event) {
              xzoom.closezoom();
            });
          };
          xzoom.openzoom(event);
        });
    });

    $(".xzoom4").each(function() {
      var xzoom = $(this).data("xzoom");
      $(this)
        .hammer()
        .on("tap", function(event) {
          event.pageX = event.gesture.center.pageX;
          event.pageY = event.gesture.center.pageY;
          var s = 1,
            ls;

          xzoom.eventmove = function(element) {
            element.hammer().on("drag", function(event) {
              event.pageX = event.gesture.center.pageX;
              event.pageY = event.gesture.center.pageY;
              xzoom.movezoom(event);
              event.gesture.preventDefault();
            });
          };

          var counter = 0;
          xzoom.eventclick = function(element) {
            element.hammer().on("tap", function() {
              counter++;
              if (counter == 1) setTimeout(openfancy, 300);
              event.gesture.preventDefault();
            });
          };

          function openfancy() {
            if (counter == 2) {
              xzoom.closezoom();
              $.fancybox.open(xzoom.gallery().cgallery);
            } else {
              xzoom.closezoom();
            }
            counter = 0;
          }
          xzoom.openzoom(event);
        });
    });

    $(".xzoom5").each(function() {
      var xzoom = $(this).data("xzoom");
      $(this)
        .hammer()
        .on("tap", function(event) {
          event.pageX = event.gesture.center.pageX;
          event.pageY = event.gesture.center.pageY;
          var s = 1,
            ls;

          xzoom.eventmove = function(element) {
            element.hammer().on("drag", function(event) {
              event.pageX = event.gesture.center.pageX;
              event.pageY = event.gesture.center.pageY;
              xzoom.movezoom(event);
              event.gesture.preventDefault();
            });
          };

          var counter = 0;
          xzoom.eventclick = function(element) {
            element.hammer().on("tap", function() {
              counter++;
              if (counter == 1) setTimeout(openmagnific, 300);
              event.gesture.preventDefault();
            });
          };

          function openmagnific() {
            if (counter == 2) {
              xzoom.closezoom();
              var gallery = xzoom.gallery().cgallery;
              var i,
                images = new Array();
              for (i in gallery) {
                images[i] = { src: gallery[i] };
              }
              $.magnificPopup.open({
                items: images,
                type: "image",
                gallery: { enabled: true }
              });
            } else {
              xzoom.closezoom();
            }
            counter = 0;
          }
          xzoom.openzoom(event);
        });
    });
  } else {
    //If not touch device

    //Integration with fancybox plugin
    $("#xzoom-fancy").bind("click", function(event) {
      var xzoom = $(this).data("xzoom");
      xzoom.closezoom();
      $.fancybox.open(xzoom.gallery().cgallery, {
        padding: 0,
        helpers: { overlay: { locked: false } }
      });
      event.preventDefault();
    });

    //Integration with magnific popup plugin
    $("#xzoom-magnific").bind("click", function(event) {
      var xzoom = $(this).data("xzoom");
      xzoom.closezoom();
      var gallery = xzoom.gallery().cgallery;
      var i,
        images = new Array();
      for (i in gallery) {
        images[i] = { src: gallery[i] };
      }
      $.magnificPopup.open({
        items: images,
        type: "image",
        gallery: { enabled: true }
      });
      event.preventDefault();
    });
  }

  // Fancybox
  $('[data-fancybox="gallery"]').fancybox({
    // Options will go here
  });
});
</script>

@endsection
