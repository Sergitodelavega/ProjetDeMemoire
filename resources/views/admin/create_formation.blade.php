@extends('back.appback')
@section('title', "Créer une formation")
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Formulaire d'ajout d'une formation</h3>
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
                    <form method="POST" action="{{ route('admin.store.formation') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0">Titre</label>
                            <div class="col-md-12">
                                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder=""
                                    class="form-control ps-0 form-control-line">
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("title")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_heure" class="col-md-12">Date et Heure</label>
                            <div class="col-md-12">
                                <input type="datetime-local" name="date_heure" id="date_heure" value="{{ old('date_heure') }}" placeholder=""
                                    class="form-control ps-0 form-control-line">
                                    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("date_heure")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="location" class="col-md-12">Lieu</label>
                            <div class="col-md-12">
                                <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder=""
                                    class="form-control ps-0 form-control-line">
                                    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("location")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-12 mb-0">Description</label>
                            <div class="col-md-12">
                                <textarea name="description" id="description" value="{{ old('description') }}" required rows="8"
                                    class="form-control ps-0 form-control-line"></textarea>
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("description")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-12">Image</label>
                            <div class="col-md-12">
                                <input type="file" name="image"
                                    class="form-control ps-0 form-control-line">
                                    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("image")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
