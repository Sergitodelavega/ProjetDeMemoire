@extends('back.appback')
@section('title', 'Activities')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Activities</h1>
        {{-- <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('admin.create.these') }}" title="Soumettre une activité"  class="btn btn-primary">Soumettre une activité</a>
        </p> --}}
    </div>

        <!-- Le tableau pour lister les doctorants -->

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Liste des activités</h4>
                           {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Semestre</th>
                                            <th class="border-top-0">Intitulé</th>
                                            <th class="border-top-0">Date limite</th>
                                            <th class="border-top-0">Statut</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        <?php $daysTime = $activity->remainingTime(); ?>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $activity->semestre }}</td>
                                            <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                            @if ($activity->status == "validée")
                                                <td>---</td>
                                            @else
                                                <td>{{ $daysTime }}<br/>{{ $activity->calculateDeadline() }}</td>
                                            @endif
                                            <td>
                                                @if($activity->status == "en attente")<span class="badge bg-primary">{{$activity->status}}</span> @endif
                                                @if($activity->status == "validée")<span class="badge bg-success">{{$activity->status}}</span> @endif
                                                @if($activity->status == "non soumis")<span class="badge bg-secondary">{{$activity->status}}</span> @endif  
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div
        </div>


@endsection