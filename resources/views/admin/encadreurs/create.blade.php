@extends('back.appback')
@section('title', "Créer un encadreur")
@section('content')
 
{{-- <form method="POST" action="{{ route('admin.store.doctorant') }}" enctype="multipart/form-data">
    @csrf
    <p>
        <label for="name">Nom et Prénom</label><br>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom et Prénom" id="name">

        <!-- Le message d'erreur pour "name" -->
			@error("name")
			<div>{{ $message }}</div>
			@enderror
    </p>
    <p>
        <label for="name">Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" id="email">

        <!-- Le message d'erreur pour "email" -->
			@error("email")
			<div>{{ $message }}</div>
			@enderror
    </p>
    <p>
        <label for="password">Mot de passe</label><br>
        <input type="password" name="password" value="{{ old('password') }}" placeholder="Mot de passe" id="password">

        <!-- Le message d'erreur pour "password" -->
			@error("password")
			<div>{{ $message }}</div>
			@enderror
    </p>
    <p>
        <label for="specialite">Spécialité</label><br>
        <input type="text" name="specialite" value="{{ old('specialite') }}" placeholder="Spécialité" id="specialite">

        <!-- Le message d'erreur pour "specialite" -->
			@error("specialite")
			<div>{{ $message }}</div>
			@enderror
    </p>

    <button type="submit" class="btn btn-primary">Créer le compte</button>
</form>  --}}

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store.encadreur') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-12 mb-0">Nom et Prénoms</label>
                            <div class="col-md-12">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Johnathan Doe"
                                    class="form-control ps-0 form-control-line">
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("name")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="johnathan@admin.com"
                                    class="form-control ps-0 form-control-line">
                                    
                            </div>
                            <!-- Le message d'erreur pour "email" -->
                            @error("email")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="matricule" class="col-md-12">Matricule</label>
                            <div class="col-md-12">
                                <input type="text" name="matricule" id="matricule" value="{{ old('matricule') }}" placeholder="123 456 789"
                                    class="form-control ps-0 form-control-line">
                                    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("matricule")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="grade" class="col-md-12 mb-0">Grade</label>
                            <div class="col-md-12">
                                <input type="text" name="grade" id="grade" value="{{ old('grade') }}" placeholder="Directeur de recherche"
                                    class="form-control ps-0 form-control-line">
                            </div>
                            <!-- Le message d'erreur pour "grade" -->
                            @error("grade")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="specialite" class="col-md-12 mb-0">Spécialité</label>
                            <div class="col-md-12">
                                <input type="text" name="specialite" id="specialite" value="{{ old('specialite') }}" placeholder="Informatique"
                                    class="form-control ps-0 form-control-line">
                            </div>
                            <!-- Le message d'erreur pour "specialite" -->
                            @error("specialite")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">Créer le compte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
