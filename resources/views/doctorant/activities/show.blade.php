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
                                <label for="title" class="col-md-12 mb-0 lead">Deadline : --- </label>
                            </div>
                        @else
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Date limite : {{ $daysTime}} - {{ $activity->calculateDeadline() }}
                            </label>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Commentaire du doctorant : </label>
                            <p class="lead">{{ $activity->comment }}</p>
                        </div>
                        @if ($activity->status == "validée" || $activity->status == "rejetée")
                            <div class="form-group">
                                <label for="title" class="col-md-12 mb-0 lead">Commentaire de l'encadreur: </label>
                                <p class="lead">{{ $comments->comment }}</p>
                            </div>  
                        @endif
                        @foreach ($activity->fichiers as $file)
                            <div id="fileList">
                                <iframe src="{{asset('upload/files/'.$file->link)}}" width="400" height="400"></iframe>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>           
</div> 
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-3" id="exampleModalLabel">Détails d'une activité</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
                                <label for="title" class="col-md-12 mb-0 lead">Deadline : --- </label>
                            </div>
                        @else
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Date limite : {{ $daysTime}} - {{ $activity->calculateDeadline() }}
                            </label>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0 lead">Commentaire du doctorant : </label>
                            <p class="lead">{{ $activity->comment }}</p>
                        </div>
                        @if ($activity->status == "validée" || $activity->status == "rejetée")
                            <div class="form-group">
                                <label for="title" class="col-md-12 mb-0 lead">Commentaire de l'encadreur: </label>
                                <p class="lead">{{ $comments->comment }}</p>
                            </div>  
                        @endif
                        @foreach ($activity->fichiers as $file)
                            <div id="fileList">
                                <iframe src="{{asset('upload/files/'.$file->link)}}" width="400" height="400"></iframe>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
