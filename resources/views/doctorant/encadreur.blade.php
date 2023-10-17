@extends('back.appback')
@section('title', 'ProfilEncadreur')
@section('content')

<div class="container-fluid">
    <div class="row" style="padding-top:20px;">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body profile-card">
                    <center class="mt-4"> 
                        <img src="{{ asset('storage/'.$user->photo) }}" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-2">{{ $user->name }}</h4>
                        <h6 class="card-subtitle" style="color: black;">{{ $user->email }}</h6>   
                        <h5 class="card-subtitle" style="color: black;">{{ $user->encadreur->matricule }}</h5>
                        <h5 class="card-subtitle" style="color: black;">{{ $user->encadreur->grade }}</h5>
                        <h5 class="card-subtitle" style="color: black;">{{ $user->encadreur->specialite }}</h5>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection