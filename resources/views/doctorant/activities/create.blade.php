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
                    <form method="POST" action="{{ route('doctorant.submitted_activity', $activity->id) }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0">Titre</label>
                            <div class="col-md-12">
                                <h3>{{ $activity->title }}</h3>
                            </div>
                            <span  class="alert-danger">@error("title"){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-12 mb-0">Description</label>
                            <div class="col-md-12">
                                <p>{{ $activity->description }}</p>
                            </div>
                            <span  class="alert-danger">@error("description"){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="files" class="col-md-12 mb-0">Sélectionnez des fichiers</label>
                            <input type="file" name="files[]" id="files" class="form-control ps-0 form-control-line"  multiple="">
                            <span class="alert-danger">@error("files"){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="comment" class="col-md-12 mb-0">Commentaire</label>
                            <textarea name="comment" id="comment" required rows="4" required
                                    class="form-control ps-0 form-control-line" placeholder="Votre commentaire">{{ isset($activity->comment) ? $activity->comment : old('comment') }}
                            </textarea>
                            <span  class="alert-danger">@error("comment"){{ $message }}@enderror</span>
                        </div>

                      
                        <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
