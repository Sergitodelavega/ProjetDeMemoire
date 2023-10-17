@extends('back.appback')
@section('title', 'ProfilDoctorant')
@section('content')

  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
   <!-- ============================================================== -->
    <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class=""> <img src="{{ asset('storage/'.$doctorant->user->photo) }}"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2">{{ $doctorant->user->name }}</h4>
                                    <h6 class="card-subtitle text-dark">{{ $doctorant->user->email }}</h6>
                                    <h5 class="card-subtitle text-dark">{{ $doctorant->laboratoire }}</h5>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Activités en attente</h4>
                                {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr scope="row">
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Semestre</th>
                                                <th class="border-top-0">Titre</th>
                                                <th class="border-top-0">Opération</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activities as $activity)
                                            @if($activity->status == "en attente")    
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $activity->semestre}}</td>
                                                <td>{{ $activity->title }}</td>
                                                <td>
                                                    <a href="{{ route('encadreur.show_activity', $activity) }}" class="btn btn-info d-none d-md-inline-block text-white">Voir plus
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
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Activités et évolution</h4>
                                {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr scope="row">
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Semestre</th>
                                                <th class="border-top-0">Titre</th>
                                                <th class="border-top-0">Date limite</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Opération</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activities as $activity)  
                                            @if($activity->status !== "en attente")    
                                            <?php $days = $activity->remainingTime(); ?>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $activity->semestre}}</td>
                                                <td>{{ $activity->title }}</td>
                                                @if ($activity->status == "validée")
                                                    <td>---</td>
                                                @else
                                                    <td>{{ $days }}<br/>{{ $activity->deadline }}</td>
                                                @endif
                                                <td>
                                                    @if($activity->status == "en attente")<span class="badge bg-primary"><i class="mdi mdi-clock"></i></span> @endif
                                                    @if($activity->status == "validée")<span class="badge bg-success"><i class="mdi mdi-check-circle"></i></span> @endif 
                                                    @if($activity->status == "non soumis")<span class="badge bg-secondary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span> @endif 

                                                </td>
                                                <td>
                                                    <a href="{{ route('encadreur.show_activity', $activity) }}" class="btn btn-info d-none d-md-inline-block text-white">Voir plus
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
            </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                


@endsection