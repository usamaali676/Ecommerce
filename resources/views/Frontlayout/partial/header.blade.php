<header class="header">
    <div class="container">
        <div class="header-top d-flex align-items-center w-100">
            <div class="header-left">
                <p class="top-message ls-0 text-uppercase text-dark d-none d-sm-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
            </div>
            <!-- End .header-left -->

            <div class="header-right header-dropdowns w-sm-100">
                <div class="header-dropdown dropdown-expanded d-none d-lg-block mr-2">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="{{route('login')}}">My Account</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('cart')}}">Cart</a></li>
                            <li><a href="{{route('login')}}" >Log In</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->

                <span class="separator"></span>

                <!--<div class="header-dropdown">-->
                <!--    <a href="#"><i class="flag-us flag"></i>ENG</a>-->
                <!--    <div class="header-menu">-->
                <!--        <ul>-->
                <!--            <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>-->
                <!--            </li>-->
                <!--            <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>-->
                <!--        </ul>-->
                <!--    </div>-->
                    <!-- End .header-menu -->
                <!--</div>-->
                <!-- End .header-dropown -->

                {{-- <div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
                    <a href="#">USD</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div> --}}
                <!-- End .header-dropown -->

                <span class="separator"></span>

                <div class="social-icons">
                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                    <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                </div>
                <!-- End .social-icons -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-top -->

    <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{route('fronthome')}}" class="logo">
                    <img src="{{asset('assets/images/logo-white.png')}}" alt="Porto Logo">
                </a>
            </div>
            <!-- End .header-left -->
            @php
            $category = App\Models\Category::all();
            @endphp

            <div class="header-right w-lg-max ml-0">
                <div class="header-icon mb-0 header-search header-search-inline header-search-category w-lg-max pl-3 pr-1">
                    <a href="#" class="search-toggle" role="button" title="Search"><i
                            class="icon-search-3"></i></a>
                    <form action="{{route('search')}}" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control bg-white" name="name" id="qq" placeholder="Search..." required>
                            <div class="select-custom bg-white">
                                <select id="category" name="cat">
                                    <option value="">All Categories</option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach


                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn icon-magnifier pb-1 bg-white" type="submit" title="Search"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <!-- End .header-search -->

                <div class="header-contact d-none d-lg-flex pl-4 ml-3 mr-xl-5">
                    <img alt="phone" src="{{asset('assets/images/phone-white.png')}}" width="30" height="30" class="pb-1" style="filter: brightness(0)">
                    <h6>Call us now<a href="tel:#" class="font1">+123 5678 890</a></h6>
                </div>

                <a href="{{route('login')}}" class="header-icon d-inline-block" title="Login"><i
                        class="icon-user-2"></i></a>

                        @if (Auth::check())
                            @php
                            $cartitem = App\Models\Cart::where('user_id', Auth::user()->id)->get();
                            $count = App\Models\Cart::where('user_id', Auth::user()->id)->count();
                            $total = 0;
                            @endphp
                        @endif
                <div class="dropdown cart-dropdown">
                    <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle">
                            @if (Auth::check())
                            {{$count}}
                            @else
                            0
                            @endif
                        </span>
                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>
                            <!-- End .dropdown-cart-header -->


                            <div class="dropdown-cart-products">
                                @if (Auth::check())
                                    @foreach ($cartitem as $item)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="{{route('singleproduct', $item->product->slug)}}">{{$item->product->name}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$item->prod_qty}}</span> × {{$item->product->price}}
                                                </span>
                                            </div>
                                            <!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="{{route('singleproduct', $item->product->slug)}}" class="product-image">
                                                    @foreach ($item->product->prodimage as $img)
                                                    @if ($loop->first)
                                                        <img src="{{asset('images/products')}}/{{$img->image}}" width="80" height="80" alt="product" />
                                                    @endif
                                                    @endforeach
                                                </a>

                                                <a href="#" id="{{$item->prod_id}}" class="btn-remove deleteCartItem" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                        <!-- End .product -->
                                        @php
                                            $subtotal = $item->product->price * $item->prod_qty;
                                            $total += $subtotal;
                                        @endphp
                                    @endforeach
                                @endif

                            </div>
                            <!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>SUBTOTAL:</span>

                                <span class="cart-total-price float-right">
                                    @if (Auth::check())
                                        £{{$total}}
                                    @else
                                    0
                                    @endif
                                </span>
                            </div>
                            <!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{route('cart')}}" class="btn btn-gray btn-block view-cart">View
                                    Cart</a>
                                <a href="{{route('checkout')}}" class="btn btn-dark btn-block">Checkout</a>
                            </div>
                            <!-- End .dropdown-cart-total -->
                        </div>
                        <!-- End .dropdownmenu-wrapper -->
                    </div>
                    <!-- End .dropdown-menu -->
                </div>
                <!-- End .dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->

    <div class="header-bottom sticky-header d-lg-block d-none" data-sticky-options="{'mobile': false}">
        <div class="container">
            <div class="header-left">
                <a href="{{route('fronthome')}}" class="logo">
                    <img src="{{asset('assets/images/logo-white.png')}}" alt="Porto Logo">
                </a>
            </div>
            <div class="header-center">
                <nav class="main-nav w-100">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{route('fronthome')}}">Home</a>
                        </li>
                        <li>
                            <a href="#">Categories</a>
                            <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="submenu" style="column-count: 2;">
                                            @foreach ($category as $item)
                                                <li><a href="{{route('categorysearch', $item->slug)}}">{{$item->name}}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="col-lg-6 p-0">
                                        <div class="menu-banner">
                                            <figure>
                                                <img src="{{asset('assets/images/menu-banner.jpg')}}" alt="Menu banner" width="300" height="300">
                                            </figure>
                                            <div class="banner-content">
                                                <h4>
                                                    <span class="">UP TO</span><br />
                                                    <b class="">50%</b>
                                                    <i>OFF</i>
                                                </h4>
                                                <a href="{{route('allproducts')}}" class="btn btn-sm btn-dark">SHOP
                                                    NOW</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .megamenu -->
                        </li>
                        <li>
                            <a href="{{route('allproducts')}}">Products</a>
                            {{-- <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href="#" class="nolink">PRODUCT PAGES</a>
                                        <ul class="submenu">
                                            <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                            <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                            <li><a href="product.html">SALE PRODUCT</a></li>
                                            <li><a href="product.html">FEATURED & ON SALE</a></li>
                                            <li><a href="product-custom-tab.html">WITH CUSTOM TAB</a></li>
                                            <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                            <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                            <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                                        </ul>
                                    </div>
                                    <!-- End .col-lg-4 -->

                                    <div class="col-lg-4">
                                        <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                        <ul class="submenu">
                                            <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                            <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                            <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                            <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                            <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                            <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a>
                                            </li>
                                            <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                            <li><a href="#">BUILD YOUR OWN</a></li>
                                        </ul>
                                    </div>
                                    <!-- End .col-lg-4 -->

                                    <div class="col-lg-4 p-0">
                                        <div class="menu-banner menu-banner-2">
                                            <figure>
                                                <img src="assets/images/menu-banner-1.jpg" alt="Menu banner" class="product-promo" width="380" height="790">
                                            </figure>
                                            <i>OFF</i>
                                            <div class="banner-content">
                                                <h4>
                                                    <span class="">UP TO</span><br />
                                                    <b class="">50%</b>
                                                </h4>
                                            </div>
                                            <a href="{{route('allproducts')}}" class="btn btn-sm btn-dark">SHOP NOW</a>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-4 -->
                                </div>
                                <!-- End .row -->
                            </div> --}}
                            <!-- End .megamenu -->
                        </li>

                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        {{-- <li class="float-right mr-3"><a href="#" class="pl-5">Special Offer!</a></li> --}}
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="qqq" placeholder="Search..." required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn p-0 icon-search-3" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <!-- End .header-search -->

                <a href="{{route('login')}}" class="header-icon "><i class="icon-user-2"></i></a>

                {{-- <a href="wishlist.html" class="header-icon"><i class="icon-wishlist-2"></i></a> --}}

                <div class="dropdown cart-dropdown">
                    <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle">
                            @if (Auth::check())
                            {{$count}}
                            @else
                            0
                            @endif
                        </span>
                    </a>

                    <div class="cart-overlay"></div>
{{--
                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>
                            <!-- End .dropdown-cart-header -->

                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="demo2-product.html">Ultimate 3D Bluetooth Speaker</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $99.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="demo2-product.html" class="product-image">
                                            <img src="assets/images/products/product-1.jpg" alt="product" width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->

                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="demo2-product.html">Brown Women Casual HandBag</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="demo2-product.html" class="product-image">
                                            <img src="assets/images/products/product-2.jpg" alt="product" width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->

                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="demo2-product.html">Circled Ultimate 3D Speaker</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="demo2-product.html" class="product-image">
                                            <img src="assets/images/products/product-3.jpg" alt="product" width="80" height="80">
                                        </a>
                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->
                            </div>
                            <!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>SUBTOTAL:</span>

                                <span class="cart-total-price float-right">$134.00</span>
                            </div>
                            <!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                    Cart</a>
                                <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                            </div>
                            <!-- End .dropdown-cart-total -->
                        </div>
                        <!-- End .dropdownmenu-wrapper -->
                    </div> --}}
                    <!-- End .dropdown-menu -->
                </div>
                <!-- End .dropdown -->
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-bottom -->
</header>
<!-- End .header -->
