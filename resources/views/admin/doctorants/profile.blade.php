@extends('back.appback')
@section('title', 'ProfilDoctorant')
@section('content')

<div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class=""> <img src="{{ asset('storage/'.$doctorant->user->photo) }}" class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2">{{ $doctorant->user->name }}</h4>
                                    <h6 class="card-subtitle" style="color: black;">{{ $doctorant->user->email }}</h6>
                                    <h5 class="card-subtitle" style="color: black;">{{ $doctorant->matricule }}</h5>
                                    <h5 class="card-subtitle" style="color: black;">{{ $doctorant->year }}</h5>
                                    <h5 class="card-subtitle" style="color: black;">{{ $doctorant->specialite }}</h5>
                                    {{-- <h5 class="card-subtitle text-black">{{ $doctorant->laboratoire }}</h5> --}}
                                    @if ($doctorant->encadreur)
                                    Encadreur
                                    <h4>{{ $doctorant->encadreur->user->name }}</h4>
                                    @else
                                    <h4>Pas d'encadreur</h4>
                                    @endif

                                    @if (empty($doctorant->these->title))
                                    <a href="{{ route('admin.create.these', $doctorant->id)}}" class="btn btn-info d-none d-md-inline-block text-white">Définir la thèse
                                    </a>
                                    @else
                                    <p>Sujet de thèse</p>
                                    <h5 class="card-subtitle" style="color: black;">{{ $doctorant->these->title }}</h5>
                                    @endif
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ses activités et leur évolution</h4>
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr scope="row">
                                                <th class="border-top-0">Se</th>
                                                <th class="border-top-0">Intitulé</th>
                                                <th class="border-top-0">Date limite</th>
                                                <th class="border-top-0">Statut</th>
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
                                                    </td>
                                                </tr>
                                                @elseif($doctorant->year =="2e année" && $activity->year_id == 2)
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
                                                        @if($activity->status == "en attente")<span class="badge bg-primary">{{$activity->status}}</span> @endif
                                                        @if($activity->status == "validée")<span class="badge bg-success">{{$activity->status}}</span> @endif
                                                        @if($activity->status == "non soumis")<span class="badge bg-secondary">{{$activity->status}}</span> @endif  
                                                    </td>
                                                </tr>
                                                @elseif($doctorant->year =="3e année" && $activity->year_id == 3)
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
                                                        @if($activity->status == "en attente")<span class="badge bg-primary">{{$activity->status}}</span> @endif
                                                        @if($activity->status == "validée")<span class="badge bg-success">{{$activity->status}}</span> @endif
                                                        @if($activity->status == "non soumis")<span class="badge bg-secondary">{{$activity->status}}</span> @endif  
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
                    <!-- Column -->
                    <!-- Column -->
                </div>
                {{-- <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ses activités et leur évolution</h4>
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr scope="row">
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Semestre</th>
                                                <th class="border-top-0">Intitulé</th>
                                                <th class="border-top-0">Deadline</th>
                                                <th class="border-top-0">Status</th>
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
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                


@endsection