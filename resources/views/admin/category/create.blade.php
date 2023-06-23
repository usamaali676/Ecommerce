@extends('layouts.app')
@section('admincontent')

<div class="pagetitle">
    <h1>Create Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Category</h5>

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error" style="color: red">{{$error}}</div>
                @endforeach
                @endif

                <!-- Vertical Form -->
                <form action="{{route('category.store')}}" method="POST" class="row g-3" >
                    @csrf
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" id="inputNanme4" required>
                  </div>
                  <div class="col-6">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" required>
                  </div>
                  <div >
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
