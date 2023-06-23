@extends('layouts.app')
@section('admincontent')
<section class="profile">
    <div class="profile-overview">
        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->

                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Profile Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Role</div>
                                <div class="col-lg-9 col-md-8">{{$user->roles->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                            </div>



                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
