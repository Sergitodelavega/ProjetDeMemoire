@extends('back.appback')
@section('title', 'ProfilDoctorant')
@section('content')

<?php 

if (auth()->check()) {
    // L'utilisateur est connecté, vous pouvez accéder à sa session
    $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
}

?>
@if($user->role === 'doctorant')
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
                <div class="row" style="padding-top:20px;">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="mt-4"> <img src="{{ asset('back/assets/images/users/5.jpg') }}"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2">{{ $user->name }}</h4>
                                    <h6 class="card-subtitle">{{ $user->email }}</h6>
                                    <h5 class="card-subtitle text-dark">{{ $user->doctorant->matricule }}</h5>
                                    <h5 class="card-subtitle text-dark">{{ $user->doctorant->specialite }}</h5>
                                    <h5 class="card-subtitle text-dark">Laboratoire de Chimie Organique Physique et de Synthèse (LRCOPS)</h5>
                                    <h5 class="card-subtitle text-dark">École doctorale Chimie Application</h5>
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
                                            <button class="btn btn-success mx-auto mx-md-0 text-white">Modifier</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Ancien mot de passe</label>
                                        <div class="col-md-12">
                                            <input type="password" value="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Nouveau mot de passe</label>
                                        <div class="col-md-12">
                                            <input type="password" value="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Confirmer mot de passe</label>
                                        <div class="col-md-12">
                                            <input type="password" value="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button class="btn btn-success mx-auto mx-md-0 text-white">Changer mot de passe</button>
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