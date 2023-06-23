@extends('layouts.app')
@section('admincontent')

<div class="pagetitle">
    <h1>Create Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Product</h5>

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error" style="color: red">{{$error}}</div>
                @endforeach
                @endif

                <!-- Vertical Form -->
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" class="row g-3" >
                    @csrf
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
                        <label>Zip
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
                        <input type="hidden" name="total_price" value="">
                    </div>


                    <div class="form-group">
                        <label class="order-comments">Order notes (optional)</label>
                        <textarea class="form-control" name="notes" placeholder="Notes about your order, e.g. special notes for delivery." required></textarea>
                    </div>

                  <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form><!-- Vertical Form -->

              </div>
            </div>


          </div>
    </div>
  </section>

@endsection
