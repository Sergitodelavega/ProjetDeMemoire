@extends('back.appback')
@section('title', 'ProfilAdmin')
@section('content')

<?php 

if (auth()->check()) {
    // L'utilisateur est connecté, vous pouvez accéder à sa session
    $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
}

?>
@if($user->role === "admin")
 <!--  <div class="page-breadcrumb">
      <div class="row align-items-center">
          <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Profil</h3>
              <div class="d-flex align-items-center">
                  {{-- <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                      </ol>
                  </nav> --}}
              </div>
          </div>
          <div class="col-md-6 col-4 align-self-center">
              <div class="text-end upgrade-btn">
                  <a href="https://www.wrappixel.com/templates/materialpro/"
                      class="btn btn-danger d-none d-md-inline-block text-white" target="_blank">Upgrade to
                      Pro</a>
              </div>
          </div>
      </div>
  </div>
  ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
   <!-- ============================================================== -->
    <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row" style="padding-top:20px; ">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="mt-4"> <img src="{{ asset('back/assets/images/users/1.png') }}"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2">{{ $user->name }}</h4>
                                    <h6 class="card-subtitle">{{ $user->email }}</h6>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="{{ $user->email }}"
                                                class="form-control ps-0 form-control-line" name="example-email"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button class="btn btn-success mx-auto mx-md-0 text-white">Update
                                                Email</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Old Password</label>
                                        <div class="col-md-12">
                                            <input type="password" value="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" value="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Confirm Password</label>
                                        <div class="col-md-12">
                                            <input type="password" value="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button class="btn btn-success mx-auto mx-md-0 text-white">Update
                                                Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
@endif
@endsection