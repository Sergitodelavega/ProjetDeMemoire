@extends('back.appback')
@section('title', "Détails d'une activité")
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Détails d'une activité</h3>
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
                    <?php $daysTime = $activity->remainingTime(); ?>
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Description : {{ $activity->description }} </label>
                            
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Semestre : {{ $activity->semestre }} </label>
                            <p></p>
                        </div>
                        @if ($activity->status == "validée")
                            <div class="form-group">
                                <label for="title" class="col-md-12 mb-0">Deadline : </label>
                                <p>---</p>
                            </div>
                        @else
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Date limite : {{ $daysTime}} - {{ $activity->calculateDeadline() }}
                            </label>
                            
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Commentaire : </label>
                            <p class="lead">{{ $activity->comment }}</p>
                        </div>
                        @if ($activity->status == "validée")
                            <div class="form-group">
                                <label for="title" class="col-md-12 mb-0">Commentaire de l'encadreur: </label>
                                <p>{{ $comments->comment }}</p>
                            </div>  
                        @endif
                        
                      
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
