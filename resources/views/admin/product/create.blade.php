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
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name"  class="form-control" id="name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputrole" class="form-label">Category</label>
                            <select id="inputrole" name="category_id" class="form-select">
                            <option selected>Please Select</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" id="inputPassword5">
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" name="images[]" type="file" id="formFile" multiple="multiple">                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="ckeditor form-control" id="editor" ></textarea>
                        </div>
                        <div class="col-12">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="qty">
                        </div>
                        <div class="col-12" style="margin: 25px 0px;">
                            {{-- <p>Status</p> --}}
                            <div class="form-check form-switch" >
                                <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault">

                              </div>
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
