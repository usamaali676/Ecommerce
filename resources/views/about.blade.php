@extends('Frontlayout.master')
@section('content')
<main class="main about">
    <div class="page-header page-header-bg text-left"
        style="background: 50%/cover #D4E1EA url('assets/images/page-header-bg.jpg');">
        <div class="container">
            <h1><span>ABOUT US</span>
                OUR COMPANY</h1>
            <a href="demo2-contact.html" class="btn btn-dark">Contact</a>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demo1.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="about-section">
        <div class="container">
            <h2 class="subtitle">OUR STORY</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book.</p>

            <p class="lead">“ Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                default model search for evolved over sometimes by accident, sometimes on purpose ”</p>
        </div><!-- End .container -->
    </div><!-- End .about-section -->

    <div class="features-section bg-gray">
        <div class="container">
            <h2 class="subtitle">WHY CHOOSE US</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-shipped"></i>

                        <div class="feature-box-content p-0">
                            <h3>Free Shipping</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industr.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-us-dollar"></i>

                        <div class="feature-box-content p-0">
                            <h3>100% Money Back Guarantee</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industr.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-online-support"></i>

                        <div class="feature-box-content p-0">
                            <h3>Online Support 24/7</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industr.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .features-section -->

    <div class="testimonials-section">
        <div class="container">
            <h2 class="subtitle text-center">HAPPY CLIENTS</h2>

            <div class="testimonials-carousel owl-carousel owl-theme images-left" data-owl-options="{
                'margin': 20,
                'lazyLoad': true,
                'autoHeight': true,
                'dots': false,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '992': {
                        'items': 2
                    }
                }
            }">
                <div class="testimonial">
                    <div class="testimonial-owner">
                        <figure>
                            <img src="assets/images/clients/client1.png" alt="client">
                        </figure>

                        <div>
                            <strong class="testimonial-title">John Smith</strong>
                            <span>SMARTWAVE CEO</span>
                        </div>
                    </div><!-- End .testimonial-owner -->

                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                            dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                    </blockquote>
                </div><!-- End .testimonial -->

                <div class="testimonial">
                    <div class="testimonial-owner">
                        <figure>
                            <img src="assets/images/clients/client2.png" alt="client">
                        </figure>

                        <div>
                            <strong class="testimonial-title">Bob Smith</strong>
                            <span>SMARTWAVE CEO</span>
                        </div>
                    </div><!-- End .testimonial-owner -->

                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                            dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                    </blockquote>
                </div><!-- End .testimonial -->

                <div class="testimonial">
                    <div class="testimonial-owner">
                        <figure>
                            <img src="assets/images/clients/client1.png" alt="client">
                        </figure>

                        <div>
                            <strong class="testimonial-title">John Smith</strong>
                            <span>SMARTWAVE CEO</span>
                        </div>
                    </div><!-- End .testimonial-owner -->

                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                            dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                    </blockquote>
                </div><!-- End .testimonial -->
            </div><!-- End .testimonials-slider -->
        </div><!-- End .container -->
    </div><!-- End .testimonials-section -->


    <!-- End .counters-section -->
</main><!-- End .main -->
@endsection
