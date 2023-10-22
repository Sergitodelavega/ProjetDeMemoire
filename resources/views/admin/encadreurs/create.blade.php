@extends('back.appback')
@section('title', "Créer un encadreur")
@section('content')
 
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Formulaire d'ajout d'un encadreur</h3>
            <div class="d-flex align-items-center">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    @if (isset($encadreur))
                    <form method="POST" action="{{ route('admin.encadreur.update', $encadreur->id) }}" enctype="multipart/form-data" >
                        @method('PUT')
                    @else
                    <form method="POST" action="{{ route('admin.store.encadreur') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-12 mb-0 lead">Nom et Prénoms</label>
                            <input style="font-size: 15px;" type="text" name="name" id="name" value="{{ isset($encadreur->user->name) ? $encadreur->user->name : old('name') }}" placeholder="Johnathan Doe"
                                    class="form-control ps-0 form-control-line">
                            <span class="alert-danger">@error("name"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12 mb-0 lead">Email</label>
                            <input style="font-size: 15px;" type="email" name="email" id="email" value="{{ isset($encadreur->user->email) ? $encadreur->user->email : old('email') }}" placeholder="johnathan@admin.com"
                                    class="form-control ps-0 form-control-line">
                            <span class="alert-danger">@error("email"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="matricule" class="col-md-12 mb-0 lead">Matricule</label>
                            <input style="font-size: 15px;" type="text" name="matricule" id="matricule" value="{{ isset($encadreur->matricule) ? $encadreur->matricule : old('matricule') }}" placeholder="12345678"
                                    class="form-control ps-0 form-control-line">
                            <span class="alert-danger">@error("matricule"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="grade" class="col-md-12 mb-0 lead">Grade</label>
                            <input style="font-size: 15px;" type="text" name="grade" id="grade" value="{{ isset($encadreur->grade) ? $encadreur->grade : old('grade') }}" placeholder="Directeur de recherche"
                                    class="form-control ps-0 form-control-line">
                            <span class="alert-danger">@error("grade"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="specialite" class="col-md-12 mb-0 lead">Spécialité</label>
                            <input style="font-size: 15px;" type="text" name="specialite" id="specialite" value="{{ isset($encadreur->specialite) ? $encadreur->specialite : old('specialite') }}" placeholder="Informatique"
                                    class="form-control ps-0 form-control-line">
                            <span class="alert-danger">@error("specialite"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            @if (isset($encadreur->user->photo))
                                <p>
                                    <span>Photo de profil actuelle</span><br>
                                    <img src="{{ asset('storage/'.$encadreur->user->photo) }}" style="max-height: 200px;" >
                                </p>
                            @endif

                            <label for="photo" class="col-md-12 mb-0 lead">Photo de profil</label>
                            <input style="font-size: 15px;" type="file" name="photo" id="photo" value="{{ old('photo') }}" 
                                    class="form-control ps-0 form-control-line">
                            <span class="alert-danger">@error("photo"){{ $message }}@enderror</span>
                        </div>
                        @if (isset($encadreur))
                            <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white">Mettre à jour</button>
                        @else
                            <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white">Créer le compte</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
