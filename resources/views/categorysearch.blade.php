@extends('Frontlayout.master')
@section('content')

<main class="main">
    <div class="category-banner-container bg-gray">
        <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('{{asset('assets/images/banners/banner-top.jpg')}}');">
            <div class="container position-relative">
                <div class="row">
                    <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">
                        <h3>Lorem Ipsum<br>Deals</h3>
                        {{-- <a href="category.html" class="btn btn-dark">Get Yours!</a> --}}
                    </div>
                    <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                        <div class="coupon-sale-content">
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive COUPON
                            </h4>
                            <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-dark">$100</b> OFF</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9 main-content">
                <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle">
                            <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path
                                    d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path
                                    d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>

                        {{-- <div class="toolbox-item toolbox-sort">
                            <label>Sort By:</label>

                            <div class="select-custom">
                                <select name="orderby" class="form-control">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->


                        </div> --}}
                        <!-- End .toolbox-item -->
                    </div>
                    <!-- End .toolbox-left -->

                    {{-- <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item layout-modes">
                            <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="category-list.html" class="layout-btn btn-list" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                        <!-- End .layout-modes -->
                    </div> --}}
                    <!-- End .toolbox-right -->
                </nav>

                <div class="row">
                    @foreach ($products as $item)
                        <div class="col-6 col-sm-4">
                            <div class="product-default">
                                <figure>
                                    <a href="{{route('singleproduct', $item->slug)}}">
                                        @foreach ($item->prodimage as $img)
                                        @if ($loop->iteration >= 2)
                                            <img src="{{asset('images/products')}}/{{$img->image}}" width="265" height="265" alt="product" />
                                        @endif
                                        @endforeach
                                    </a>

                                </figure>

                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="{{route('categorysearch', $item->slug)}}" class="product-category">{{$item->category->name}}</a>
                                        </div>
                                    </div>

                                    <h3 class="product-title"> <a href="{{route('singleproduct', $item->slug)}}">{{$item->name}}</a> </h3>

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
                                        {{-- <span class="old-price">$90.00</span> --}}
                                        <span class="product-price">${{$item->price}}</span>
                                    </div>
                                    <!-- End .price-box -->

                                    <div class="product-action">
                                        {{-- <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                class="icon-heart"></i></a> --}}
                                        <a href="{{route('singleproduct', $item->slug)}}" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i><span>Add to Cart</span></a>
                                        {{-- <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> --}}
                                    </div>
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- End .col-sm-4 -->
                    @endforeach


                </div>
                <!-- End .row -->

                <nav class="toolbox toolbox-pagination">
                    {{-- <div class="toolbox-item toolbox-show">
                        <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div> --}}
                    <!-- End .toolbox-item -->

                    <ul class="pagination toolbox-item">

                        {{$products->links('pagination.custom')}}

                        {{-- <li class="page-item disabled">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#"></a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><span class="page-link">...</span></li>
                        <li class="page-item">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
            <!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                        </h3>

                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                <ul class="cat-list">
                                @foreach ($categoryall as $item)
                                <li><a href="#">{{$item->name}}<span class="products-count">({{($item->prod_count)}})</span></a></li>
                                @endforeach
                                </ul>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget widget-block">
                        <h3 class="widget-title">Custom HTML Block</h3>
                        <h5>This is a custom sub-title.</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus </p>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .sidebar-wrapper -->
            </aside>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->

    <div class="mb-4"></div>
    <!-- margin -->
</main>
<!-- End .main -->


@endsection
