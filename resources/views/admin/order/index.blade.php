@extends('layouts.app')

@section('admincontent')
    <div class="pagetitle">
    <h1>Orders</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Orders</li>
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
                  <th scope="col">Email</th>
                  <th scope="col">Tracking Number</th>
                  <th scope="col">Price</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($order as $item)
                <tr>
                    <th scope="row">{{$srno++}}</th>
                    <td>{{$item->fname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->tracking_no}}</td>
                    <td>{{$item->total_price}}</td>
                    @if ($item->status == 1)
                    <td>Complete</td>
                    @else
                    <td>Pending</td>
                    @endif

                    <td>
                        @if (Auth::user()->role_id == 1)<a href="{{route('order.edit',$item->id)}}" type="button" class="btn btn-warning" style="color: #fff"><i class="bx bxs-pencil"></i></a>@endif
                        <a href="{{route('order.show',$item->id)}}" type="button" class="btn btn-success"><i class="bx bx-show-alt"></i></a>
                        @if (Auth::user()->role_id == 1)<a onclick="return confirm('Are you sure?');" href="{{route('order.delete',$item->id)}}"  type="button" class="btn btn-danger"><i class="bx bx-trash"></i></a>@endif
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
