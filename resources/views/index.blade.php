@extends('Frontlayout.master')
@section('content')


<div class="container mt-2">
    <div class="row">
        {{-- <div class="col-lg-3 mb-2 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200" data-animation-duration="1000">
            <div class="side-menu-wrapper">
                <h2 class="side-menu-title ls-10">Top Categories</h2>

                <div class="side-menu-body mb-2 px-3 mx-3">
                    <ul class="side-menu pb-1">
                        <li><a href="#"><i class="icon-category-fashion"></i>Fashion</a></li>
                        <li><a href="#"><i
                                    class="icon-category-electronics"></i>Electronics</a></li>
                        <li><a href="#"><i class="icon-category-gifts"></i>Gifts</a></li>
                        <li><a href="#"><i class="icon-category-garden"></i>Home &amp;
                                Garden</a></li>
                        <li><a href="#"><i class="icon-category-music"></i>Music</a></li>
                        <li><a href="#"><i class="icon-cat-sport"></i>Sports</a></li>
                    </ul>

                    <a href="#" class="btn btn-block btn-dark btn-lg px-0 ls-10">Huge Sale -
                        <strong>70%</strong>
                        Off</a>
                </div>
                <!-- End .side-menu-body -->
            </div>
            <!-- End .side-custom-menu -->
        </div> --}}
        <!-- End .col-lg-3 -->

        <div class="col-lg-12 mb-2 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="400" data-animation-duration="1000">
            <div class="home-slider owl-carousel owl-theme" data-owl-options="{
                'dots': true,
                'nav': false,
                'autoplay' : true,
                'autoplayTimeout': 5000
            }">
                <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                    <img class="slide-bg" style="background-color: #71b5da;" src="{{asset('assets/images/demoes/demo2/slider/slide-1.jpg')}}" width="835" height="415" alt="slider image">
                    <div class="banner-layer">
                        <h4 >Samsung</h4>
                        <h2>Samsung A Series</h2>
                        <h3 class="text-uppercase">30% Off</h3>
                        <h5 class=" text-uppercase d-inline-flex ls-n-20 mb-0">Starting At <b class="coupon-sale-text text-secondary bg-white">£<em
                                    class="align-text-top">100</em>99</b></h5>
                        <a href="#" class="btn btn-dark">Get Yours!</a>
                    </div>
                    <!-- End .banner-layer -->
                </div>
                <!-- End .home-slide -->

                <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                    <img class="slide-bg" style="background-color: #dadada;" src="{{asset('assets/images/demoes/demo2/slider/slide-2.jpg')}}" width="835" height="415" alt="slider image">
                    <div class="banner-layer text-uppercase">
                        <h4>Samsung </h4>
                        <h2>Samsung S Series</h2>
                        <h5 class="d-inline-block mb-0 align-top mr-4 pr-3">Starting At
                            <b>£<em>699</em>99</b>
                        </h5>

                        <a href="#" class="btn btn-dark ls-10">Get Yours!</a>
                    </div>
                    <!-- End .banner-layer -->
                </div>
                <!-- End .home-slide -->

                <div class=" home-slide home-slide3 banner banner-md-vw banner-sm-vw d-flex
                            align-items-center">
                    <img class="slide-bg" src="{{asset('assets/images/demoes/demo2/slider/slide-3.jpg')}}" style="background-color: #ccc;" width="835" height="415" alt="home slider" />
                    <div class="banner-layer text-uppercase">
                        <h4>Samsung</h4>
                        <h2>Samsung F Series</h2>
                        <h5 class="d-inline-block mb-0 align-top mr-4 pr-3">Starting At
                            <b>£<em>170</em>99</b>
                        </h5>
                        <a href="#" class="btn btn-dark">Get Yours!</a>
                    </div>
                    <!-- End .banner-layer -->
                </div>
                <!-- End .home-slide -->
            </div>
            <!-- End .home-slider -->
        </div>
        <!-- End .col-lg-9 -->
    </div>
    <!-- End .row -->

    <div class="info-boxes-container row row-joined mb-1 appear-animate" data-animation-name="fadeInUpShorter" data-animation-duration="1000">
        <div class="info-box info-box-icon-left col-lg-4">
            <i class="icon-shipping"></i>

            <div class="info-box-content">
                <h4>FREE SHIPPING &amp; RETURN</h4>
                <p class="text-body">Free shipping on all orders over £99.</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->

        <div class="info-box info-box-icon-left col-lg-4">
            <i class="icon-money"></i>

            <div class="info-box-content">
                <h4>MONEY BACK GUARANTEE</h4>
                <p class="text-body">100% money back guarantee</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->

        <div class="info-box info-box-icon-left col-lg-4">
            <i class="icon-support"></i>

            <div class="info-box-content">
                <h4>ONLINE SUPPORT 24/7</h4>
                <p class="text-body">Lorem ipsum dolor sit amet.</p>
            </div>
            <!-- End .info-box-content -->
        </div>
        <!-- End .info-box -->
    </div>
    <!-- End .info-boxes-container -->

    <div class="banners-grid text-uppercase grid" data-grid-options="{
        'sortReorder': true
    }">
        <div class="banner banner1 grid-item banner-md-vw w-25 w-md-100 text-transform-none w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="100" data-animation-duration="1000" data-md-order="1">
            <figure>
                <img src="{{asset('assets/images/demoes/demo2/banners/banner-1.jpg')}}" style="background-color: #ccc;" alt="banner">
            </figure>

            <div class="banner-layer banner-layer-middle text-right">
                <h4 class="banner-layer-circle-item ml-auto mb-2 ls-0">40<sup>%<small
                            class="ls-0">OFF</small></sup></h4>
                <h5 class="m-b-3 ls-0"><del class="d-block m-b-2">£450</del>£270</h5>
                <h4 class="m-b-1 ls-n-0">Lorem Ipsum</h4>
                <h3 class="mb-0 ls-0">dolor sit</h3>
            </div>
        </div>
        <!-- End .banner -->

        <div class="banner banner7 grid-item banner-md-vw w-50 w-md-100 order-lg-0 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000" data-md-order="3">
            <figure>
                <img src="{{asset('assets/images/demoes/demo2/banners/banner-7.jpg')}}" style="background-color: #444;" alt="banner">
            </figure>

            <div class="banner-layer banner-layer-middle d-flex align-items-end flex-column">
                <h3 class="m-b-3 text-white text-right ls-0">Lorem Ipsum Dolor <br>Sit doer</h3>

                <div class="coupon-sale-content">
                    <h4 class="mb-1 coupon-sale-text bg-white d-block ls-n-10 text-transform-none">
                        Sit elquaible doer
                    </h4>
                    <h5 class="coupon-sale-text text-white ls-n-10 p-0"><i class="ls-0">UP TO</i><b class="text-dark">£100</b> OFF</h5>
                    <a href="#" class="btn btn-block btn-dark btn-black">Get Yours!</a>
                </div>
            </div>
        </div>
        <!-- End .banner -->

        <div class="banner banner4 grid-item banner-md-vw w-25 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="300" data-animation-duration="1000" data-md-order="7">
            <figure>
                <img src="{{asset('assets/images/demoes/demo2/banners/banner-4.jpg')}}" style="background-color: #444;" alt="banner">
            </figure>
            <div class="banner-layer banner-layer-middle text-right">
                <h2 class="m-b-2 text-secondary ls-n-20">Sit elquaible doer</h2>
                <h3 class="m-b-1 ls-n-20">Sit elquaible<br> Ipsum Dolor</h3>
                <h4 class="text-white ls-n-20">Starting<br>AT <sup>£</sup>199<sup>99</sup></h4>
                <a href="#" class="btn btn-light ls-10">View Now</a>
            </div>
        </div>
        <!-- End .banner -->

        <div class="banner banner5 grid-item banner-md-vw text-center w-25 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400" data-animation-duration="1000" data-md-order="8">
            <figure>
                <img src="{{asset('assets/images/demoes/demo2/banners/banner-5.jpg')}}" style="background-color: #ccc;" alt="banner">
            </figure>
            <div class="banner-layer banner-layer-top">
                <h4 class="heading-border">Lorem Ipsum</h4>
                <h3 class="ls-0 mb-1">Sit elquaible doer</h3>
                <hr class="mb-1 mt-1">
                <h5 class="pt-1">Lorem Ipsum Dolor Sit elquaible</h5>
            </div>
            <div class="banner-layer banner-layer-bottom">
                <a href="#" class="btn btn-dark">Shop Now!</a>
            </div>
        </div>
        <!-- End .banner -->

        <div class="banner banner2 grid-item banner-md-vw w-25 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="500" data-animation-duration="1000" data-md-order="2">
            <figure>
                <img src="{{asset('assets/images/demoes/demo2/banners/banner-2.jpg')}}" style="background-color: #dce1e7;" alt="banner">
            </figure>
            <div class="banner-layer banner-layer-top text-right">
                <h3 class="ls-0">Sit elquaible doer</h3>
                <h2 class="m-b-3 ls-10 text-transform-none">Lorem Ipsum</h2>
                <h4 class="m-b-3 text-secondary ls-0">Starting at £99</h4>
                <a href="#" class="btn btn-dark ls-10">Buy Now!</a>
            </div>
        </div>
        <!-- End .banner -->

        <div class="banner banner8 grid-item banner-md-vw w-50 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="600" data-animation-duration="1000" data-md-order="4">
            <figure>
                <img src="{{asset('assets/images/demoes/demo2/banners/banner-8.jpg')}}" style="background-color: #bd9c88;" alt="banner">
            </figure>
            <div class="banner-layer banner-layer-middle">
                <h3 class="m-b-2 text-transform-none">Lorem Ipsum</h3>
                <h4 class="m-b-3">50% Off</h4>
                <a href="#" class="btn btn-dark ls-10">Get Yours!</a>
            </div>
        </div>
        <!-- End .banner -->


        <div class="grid-col-sizer w-25"></div>
    </div>
    <!-- End .banners-grid -->
</div>
<!-- End .container -->

<div class="mb-1"></div>
<!-- margin -->

<div class="products-section section-bg-gray">
    <div class="container">
        <h2 class="section-title appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">Featured Products</h2>
        <div class="row">
            @foreach ($product as $item)
                <div class=" col-sm-3 product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                    <figure class="img-effect">
                        <a href="{{route('singleproduct', $item->slug)}}">
                            @foreach ($item->prodimage as $img)
                            @if ($loop->iteration >= 2)
                                <img src="{{asset('images/products')}}/{{$img->image}}" style=" width:265px; height:265px; " alt="product" />
                            @endif
                            @endforeach
                        </a>
                        {{-- <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                        </div> --}}
                        <div class="btn-icon-group">
                            <a href="{{route('singleproduct', $item->slug)}}" class="btn-icon  product-type-simple"><i
                                    class="icon-shopping-cart"></i></a>
                        </div>
                        <a href="{{route('singleproduct', $item->slug)}}" class="btn-quickview" title="Quick View">Quick
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
    </div>
</div>


<div class="brands-section mt-5 mb-5 appear-animate" data-animation-delay="200" data-animation-name="fadeIn" data-animation-duration="1000">
    <div class="container">
        <div class="brands-slider owl-carousel owl-theme images-center" data-owl-options="{
            'margin': 0
        }">
            <img src="{{asset('assets/images/brands/small/brand1.png')}}" width="140" height="60" alt="brand">
            <img src="{{asset('assets/images/brands/small/brand2.png')}}" width="140" height="60" alt="brand">
            <img src="{{asset('assets/images/brands/small/brand3.png')}}" width="140" height="60" alt="brand">
            <img src="{{asset('assets/images/brands/small/brand4.png')}}" width="140" height="60" alt="brand">
            <img src="{{asset('assets/images/brands/small/brand5.png')}}" width="140" height="60" alt="brand">
            <img src="{{asset('assets/images/brands/small/brand6.png')}}" width="140" height="60" alt="brand">
        </div>
        <!-- End .brands-slider -->
    </div>
</div>

@endsection
