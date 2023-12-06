@extends('back.appback')
@section('title', 'Activities')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Activities</h1>
    </div>

        <!-- Le tableau pour lister les doctorants -->

    <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
        @if ($doctorant->year =="1re année")
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Liste des activités (1re année)</h4>
                           {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>
                                            <th class="border-top-0">Date limite</th>
                                            <th class="border-top-0">Statut</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="1re année" && $activity->year_id == 1)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                            <tr>
                                                <td>{{ $activity->semestre }}</td>
                                                <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                @if ($activity->status == "validée")
                                                    <td>---</td>
                                                @else
                                                    <td>{{ $daysTime }}<br/>{{ $activity->calculateDeadline() }}</td>
                                                @endif
                                                <td>
                                                    @if($activity->status == "en attente")<span class="badge bg-primary"><i class="mdi mdi-clock"></i></span> @endif
                                                    @if($activity->status == "validée")<span class="badge bg-success"><i class="mdi mdi-check-circle"></i></span> @endif
                                                    @if($activity->status == "non soumis")<span class="badge bg-secondary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span> @endif  
                                                    @if($activity->status == "rejetée")<span class="badge bg-danger"><i class="mdi mdi-close-circle-outline"></i></span> @endif  
                                                </td>
                                                <td>
                                                    @if ($activity->status == "validée" || $activity->status == "en attente")
                                                    <a href="{{ route('doctorant.activity.show', $activity) }}" class="btn btn-secondary d-none d-md-inline-block text-white">Details
                                                    </a>
                                                    @else 
                                                    <a href="{{ route('doctorant.activity_submit', $activity) }}" class="btn btn-info d-none d-md-inline-block text-white">Soumettre
                                                    @endif
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($doctorant->year =="2e année")
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Liste des activités (2e année)</h4>
                           {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>
                                            <th class="border-top-0">Date limite</th>
                                            <th class="border-top-0">Statut</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="2e année" && $activity->year_id == 2)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                                <tr>
                                                    <td>{{ $activity->semestre }}</td>
                                                    <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                    @if ($activity->status == "validée")
                                                        <td>---</td>
                                                    @else
                                                        <td>{{ $daysTime }}<br/>{{ $activity->calculateDeadline() }}</td>
                                                    @endif
                                                    <td>
                                                        @if($activity->status == "en attente")<span class="badge bg-primary"><i class="mdi mdi-clock"></i></span> @endif
                                                        @if($activity->status == "validée")<span class="badge bg-success"><i class="mdi mdi-check-circle"></i></span> @endif
                                                        @if($activity->status == "non soumis")<span class="badge bg-secondary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span> @endif  
                                                        @if($activity->status == "rejetée")<span class="badge bg-danger"><i class="mdi mdi-close-circle-outline"></i></span> @endif  
                                                    </td>
                                                    <td>
                                                        @if ($activity->status == "validée" || $activity->status == "en attente")
                                                        <a href="{{ route('doctorant.activity.show', $activity) }}" class="btn btn-secondary d-none d-md-inline-block text-white">Details
                                                        </a>
                                                        @else 
                                                        <a href="{{ route('doctorant.activity_submit', $activity) }}" class="btn btn-info d-none d-md-inline-block text-white">Soumettre
                                                        @endif
                                                        </a>
                                                    </td>
                                                </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($doctorant->year =="3e année")
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Liste des activités (3e année)</h4>
                           {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>
                                            <th class="border-top-0">Date limite</th>
                                            <th class="border-top-0">Statut</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="3e année" && $activity->year_id == 3)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                            <tr>
                                                <td>{{ $activity->semestre }}</td>
                                                <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                @if ($activity->status == "validée")
                                                    <td>---</td>
                                                @else
                                                    <td>{{ $daysTime }}<br/>{{ $activity->calculateDeadline() }}</td>
                                                @endif
                                                <td>
                                                    @if($activity->status == "en attente")<span class="badge bg-primary"><i class="mdi mdi-clock"></i></span> @endif
                                                    @if($activity->status == "validée")<span class="badge bg-success"><i class="mdi mdi-check-circle"></i></span> @endif
                                                    @if($activity->status == "non soumis")<span class="badge bg-secondary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span> @endif
                                                    @if($activity->status == "rejetée")<span class="badge bg-danger"><i class="mdi mdi-close-circle-outline"></i></span> @endif  
                                                </td>
                                                <td>
                                                    @if ($activity->status == "validée" || $activity->status == "en attente")
                                                    <a href="{{ route('doctorant.activity.show', $activity) }}" class="btn btn-secondary d-none d-md-inline-block text-white">Details
                                                    </a>
                                                    @else 
                                                    <a href="{{ route('doctorant.activity_submit', $activity) }}" class="btn btn-info d-none d-md-inline-block text-white">Soumettre
                                                    @endif
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


      <!-- Modal -->
  <div class="modal fade" id="exampleModal-{{$activity->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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