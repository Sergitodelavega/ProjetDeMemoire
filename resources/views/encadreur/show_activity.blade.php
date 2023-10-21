@extends('back.appback')
@section('title', "Validation d'une activité")
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Validation d'une activité</h3>
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
                <div class="card-header"><h3>{{ $activity->title }}</h3></div>
                <div class="card-body">
                    <?php $days = $activity->remainingTime(); ?>
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Description : {{ $activity->description }} </label>
                            
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Semestre : {{ $activity->semestre }}</label>
                            
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Deadline : {{ $days }}  -  {{ $activity->calculateDeadline() }}</label>
                            
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Commentaire : </label>
                            <p class="lead">{{ $activity->comment }}</p>
                        </div>
                        <form method="POST" action="{{ route('encadreur.validate_activity', [$activity->id, $doctorant->id] ) }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="comment" class="col-md-12 mb-0 lead">Mon Commentaire</label>
                                <div class="col-md-12">
                                    <textarea name="comment" id="comment" required rows="4"
                                        class="form-control ps-0 form-control-line" placeholder="Votre commentaire"></textarea>
                                </div>
                                <!-- Le message d'erreur pour "name" -->
                                @error("comment")
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Valider</button>
                        </form>
                        {{-- <form method="POST" action="{{ route('encadreur.reject_activity', $activity->id ) }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="comment" class="col-md-12 mb-0">Mon Commentaire</label>
                                <div class="col-md-12">
                                    <textarea name="comment" id="comment" required rows="4"
                                        class="form-control ps-0 form-control-line" placeholder="Votre commentaire">{{ isset($activity->comment) ? $activity->comment : old('comment') }}</textarea>
                                </div>
                                <!-- Le message d'erreur pour "name" -->
                                @error("comment")
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Rejeter</button>
                        </form> --}}
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
