@extends('back.appback')
@section('title', "Soumission d'une activité")
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Formulaire de soumission d'une activité</h3>
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
                    <form method="GET" action="{{ route('doctorant.submitted_activity', $activity->id ) }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0">Titre</label>
                            <div class="col-md-12">
                                <h3>{{ $activity->title }}</h3>
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("title")
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-12 mb-0">Description</label>
                            <div class="col-md-12">
                                <p>{{ $activity->description }}</p>
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("description")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                       
                        <div class="form-group">
                            <label for="comment" class="col-md-12 mb-0">Commentaire</label>
                            <div class="col-md-12">
                                <textarea name="comment" id="comment" required rows="4"
                                    class="form-control ps-0 form-control-line" placeholder="Votre commentaire">{{ isset($activity->comment) ? $activity->comment : old('comment') }}</textarea>
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("comment")
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                      
                        <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
