@extends('back.appback')
@section('title', 'ProfilEncadreur')
@section('content')

<?php 
if (auth()->check()) {
    // L'utilisateur est connecté, vous pouvez accéder à sa session
    $userLoger = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
}
?>
<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body profile-card">
                    <center class="mt-4"> 
                        <img src="{{ asset('storage/'.$userLoger->photo) }}" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-2">{{ $userLoger->name }}</h4>
                        <h6 class="card-subtitle text-dark">{{ $userLoger->email }}</h6>   
                        <h5 class="card-subtitle text-dark">{{ $userLoger->encadreur->matricule }}</h5>
                        <h5 class="card-subtitle text-dark">{{ $userLoger->encadreur->grade }}</h5>
                        <h5 class="card-subtitle text-dark">{{ $userLoger->encadreur->specialite }}</h5>
                        <h5 class="card-subtitle text-dark">{{ $userLoger->ecole->name }}</h5>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="form-horizontal form-material mx-2">
                        {{-- <form action="{{ route('update_email', $userLoger->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="email" class="col-md-12">Email</label>
                                <input type="email" value="{{ $userLoger->email }}" class="form-control ps-0 form-control-line" name="email" id="email">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span> 
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Modifier</button>
                            </div>
                        </form> --}}

                        <form action="{{ route('update_password', $userLoger->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Ancien mot de passe</label>
                                <input type="password" class="form-control ps-0 form-control-line" name="old" required value="{{ old('old') }}">
                                <span class="text-danger">@error('old'){{$message}}@enderror</span>       
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Nouveau mot de passe</label>
                                <input type="password" class="form-control ps-0 form-control-line" name="password" required value="{{ old('password') }}"> 
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>       
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Confirmer mot de passe</label>
                                <input type="password" class="form-control ps-0 form-control-line" name="confirm" required value="{{ old('confirm') }}">
                                <span class="text-danger">@error('confirm'){{$message}}@enderror</span>       
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Changer mot de passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection