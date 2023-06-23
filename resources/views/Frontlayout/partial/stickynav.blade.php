<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="demo2.html">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="demo2-shop.html" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="wishlist.html" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        <a href="my-account.html" class="">
            <i class="icon-user-2"></i>Account
        </a>
    </div>
    @if (Auth::check())
    @php
    $count = App\Models\Cart::where('user_id', Auth::user()->id)->count();
    @endphp
@endif
    <div class="sticky-info">
        <a href="cart.html" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">
                    @if (Auth::check())
                      {{$count}}
                    @else
                       0
                    @endif
                </span>
            </i>Cart
        </a>
    </div>
</div>
