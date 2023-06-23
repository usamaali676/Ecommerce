@extends('layouts.app')
@section('admincontent')

<div class="pagetitle">
    <h1>Create User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create User</h5>

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error" style="color: red">{{$error}}</div>
                @endforeach
                @endif

                <!-- Vertical Form -->
                <form action="{{route('user.store')}}" method="POST" class="row g-3" >
                    @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name"  class="form-control" id="name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputrole" class="form-label">Role</label>
                            <select id="inputrole" name="role_id" class="form-select">
                            <option selected>Please Select</option>
                            @foreach ($role as $item)
                            @if ($item->id != 1)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword5">
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
