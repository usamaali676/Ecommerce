@extends('layouts.app')

@section('admincontent')
    <div class="pagetitle">
    <h1>Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item active">Index</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body" style="padding-top: 20px;">
            {{-- <h5 class="card-title">Datatables</h5> --}}

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Sr#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($category as $item)
                <tr>
                    <th scope="row">{{$srno++}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>
                        <a href="{{route('category.edit',$item->id)}}" type="button" class="btn btn-warning" style="color: #fff"><i class="bx bxs-pencil"></i></a>
                        {{-- <button type="button" class="btn btn-success"><i class="bx bx-show-alt"></i></button> --}}
                        <a onclick="return confirm('Are you sure?');" href="{{route('category.delete',$item->id)}}"  type="button" class="btn btn-danger"><i class="bx bx-trash"></i></a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
