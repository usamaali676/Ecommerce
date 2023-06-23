<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li><a href="{{route('fronthome')}}">Home</a></li>
                <li>
                    <a href="#">Categories</a>
                    <ul>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Products</a>

                </li>

                <li><a href="#">Blog</a></li>

            </ul>


            <ul class="mobile-menu">
                <li><a href="{{route('login')}}">My Account</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="{{route('cart')}}">Cart</a></li>
                <li><a href="{{route('login')}}" class="login-link">Log In</a></li>
            </ul>
        </nav>
        <!-- End .mobile-nav -->

        <form class="search-wrapper mb-2" action="#">
            <input type="text" class="form-control mb-0" placeholder="Search..." required />
            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
        </form>

        <div class="social-icons">
            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
            </a>
            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
            </a>
            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
            </a>
        </div>
    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->
