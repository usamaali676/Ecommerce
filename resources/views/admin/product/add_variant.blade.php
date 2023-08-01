@extends('layouts.app')
@section('admincontent')

<div class="pagetitle">
    <h1>Create Variant</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Variant</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

 <section class="section">
    <div class="row">
        <div class="col-lg-12" id="req_input">
        <div class="required_inp">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Variant</h5>

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error" style="color: red">{{$error}}</div>
                @endforeach
                @endif

                <!-- Vertical Form -->
                <form action="{{route('variant.store')}}" method="POST" enctype="multipart/form-data" class="row g-3" >
                    @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name"  class="form-control" id="name">
                            <input type="hidden" name="prod_id" value="{{$product->id}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputrole" class="form-label">Type</label>
                            <select id="inputrole" name="type" class="form-select">
                            <option selected>Please Select</option>
                            <option value="Color">Color</option>
                            <option value="Storage">Storage</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Stock</label>
                            <input type="text" name="stock" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" id="inputPassword5">
                        </div>
                        <div class="col-md-12">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" name="color" class="form-control" id="color">
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">Image (Dimensions 300 x 300)</label>
                            <input class="form-control" name="images[]" type="file" id="fileToUpload" multiple="multiple">
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
    </div>
  </section>

@endsection
