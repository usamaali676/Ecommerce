<!DOCTYPE html>
<html lang="en">

@include('layouts.partial.head')

<body>

  <!-- ======= Header ======= -->
  @include('layouts.partial.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.partial.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    @yield('admincontent')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 @include('layouts.partial.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts.partial.scripts')


</body>

</html>
