@extends('back.appback')
@section('title', "Créer un doctorant")
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Formulaire d'ajout d'un doctorant</h3>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    @if (isset($doctorant))
                    <form method="POST" action="{{ route('admin.doctorant.update', $doctorant->id) }}" enctype="multipart/form-data" >
                        @method('PUT')
                    @else
                    <form method="POST" action="{{ route('admin.store.doctorant') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                    
                        @endif
                        
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-12 mb-0">Nom et Prénoms</label>
                            <input type="text" name="name" id="name" value="{{ isset($doctorant->user->name) ? $doctorant->user->name : old('name') }}" placeholder="Johnathan Doe"
                                    class="form-control ps-0 form-control-line" required>
                            <span class="alert-danger">@error("name"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Email</label>
                            <input type="email" name="email" id="email" value="{{ isset($doctorant->user->email) ? $doctorant->user->email : old('email') }}" placeholder="johnathandoe@gmail.com"
                                    class="form-control ps-0 form-control-line" required>      
                            <span class="alert-danger">@error("email"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="matricule" class="col-md-12">Matricule</label>
                            <input type="text" name="matricule" id="matricule" value="{{ isset($doctorant->matricule) ? $doctorant->matricule : old('matricule') }}" placeholder="12345678"
                                    class="form-control ps-0 form-control-line" required>
                            <span class="alert-danger">@error("matricule"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="specialite" class="col-md-12 mb-0">Spécialité</label>
                            <input type="text" name="specialite" id="specialite" value="{{ isset($doctorant->specialite) ? $doctorant->specialite : old('specialite') }}" placeholder="Mathématiques"
                                    class="form-control ps-0 form-control-line" required>
                            <span class="alert-danger">@error("specialite"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="year_id" class="col-md-12">Année de thèse </label>
                                <select name="year_id" id="year_id" class="form-control ps-0 form-control-line" required>
                                    @foreach($years as $year)
                                    <option
                                        value="{{ $year->id }}" {{ old('year_id') == $year->id ? 'selected' : '' }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>    
                            <span class="alert-danger">@error("year_id"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="laboratoire_id" class="col-md-12">Laboratoire </label>
                                <select name="laboratoire_id" id="laboratoire_id" class="form-control ps-0 form-control-line" required>
                                    @foreach($laboratoires as $laboratoire)
                                    <option
                                        value="{{ $laboratoire->id }}" {{ old('laboratoire->id') == $laboratoire->id ? 'selected' : '' }}>{{ $laboratoire->name }}</option>
                                    @endforeach
                                </select>    
                            <span class="alert-danger">@error("laboratoire_id"){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            @if (isset($doctorant->user->photo))
                                <p>
                                    <span>Photo de profil actuelle</span><br>
                                    <img src="{{ asset('storage/'.$doctorant->user->photo) }}" style="max-height: 200px;" >
                                </p>
                            @endif

                            <label for="photo" class="col-md-12 mb-0">Photo de profil</label>
                            <input type="file" name="photo" id="photo" value= "{{ old('photo') }}" 
                                    class="form-control ps-0 form-control-line">
                            <span class="alert-danger">@error("photo"){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="encadreur_id" class="col-md-12">Encadreur assigné</label>
                                <select name="encadreur_id" id="encadreur_id" class="form-control ps-0 form-control-line" required>
                                   
                                    @foreach($encadreurs as $encadreur)
                                    <option
                                        value="{{ $encadreur->id }}" {{ old('encadreur_id') == $encadreur->id ? 'selected' : '' }}>{{ $encadreur->user->name }}</option>
                                    @endforeach
                                </select>    
                            <span class="alert-danger">@error("encadreur_id"){{ $message }}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white">Créer le compte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
