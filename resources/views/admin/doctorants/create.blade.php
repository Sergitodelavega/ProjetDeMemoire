@extends('back.appback')
@section('title', "Créer un doctorant")
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Formulaire d'ajout d'un doctorant</h3>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-md-6 col-4 align-self-center">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store.doctorant') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
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
                            <!-- Le message d'erreur pour "name" -->
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
                            <label for="specialite" class="col-md-12 mb-0">Spécialité</label>
                            <div class="col-md-12">
                                <input type="text" name="specialite" id="specialite" value="{{ old('specialite') }}" placeholder="123 456 7890"
                                    class="form-control ps-0 form-control-line">
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("specialite")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="encadreur_id" class="col-md-12">Encadreur assigné</label>
                            <div class="col-md-12">
                                <select name="encadreur_id" id="encadreur_id" class="form-control ps-0 form-control-line" required>
                                    @foreach($encadreurs as $encadreur)
                                    <option
                                        value="{{ $encadreur->id }}" {{ old('encadreur_id') == $encadreur->id ? 'selected' : '' }}>{{ $encadreur->user->name }}</option>
                                    @endforeach
                                </select>    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("encadreur_id")
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
