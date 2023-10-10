@extends('back.appback')
@section('title', 'ProfilDoctorant')
@section('content')

  <div class="page-breadcrumb">
      <div class="row align-items-center">
          <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Profil de {{ $doctorant->user->name }}</h3>
              <div class="d-flex align-items-center">
                  {{-- <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                      </ol>
                  </nav> --}}
              </div>
          </div>
          
      </div>
  </div>
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
                                <center class="mt-4"> <img src="{{ asset('storage/'.$doctorant->user->photo) }}"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2">{{ $doctorant->user->name }}</h4>
                                    <h6 class="card-subtitle">{{ $doctorant->user->email }}</h6>
                                    <h5 class="card-subtitle">{{ $doctorant->specialite }}</h5>
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
                                                <th class="border-top-0">Titre</th>
                                                <th class="border-top-0">Semestre</th>
                                                <th class="border-top-0">Opération</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activities as $activity)
                                            @if($activity->status == "en attente")    
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $activity->title }}</td>
                                                <td>{{ $activity->semestre}}</td>
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
                                                <th class="border-top-0">Titre</th>
                                                <th class="border-top-0">Semestre</th>
                                                <th class="border-top-0">Date limite</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Opération</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activities as $activity)  
                                            <?php $days = $activity->remainingTime(); ?>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $activity->title }}</td>
                                                <td>{{ $activity->semestre}}</td>
                                                @if ($activity->status == "validée")
                                                    <td>---</td>
                                                @else
                                                    <td>{{ $days }}<br/>{{ $activity->deadline }}</td>
                                                @endif
                                                <td>
                                                    @if($activity->status == "en attente")<span class="badge bg-primary">{{$activity->status}}</span> @endif
                                                    @if($activity->status == "validée")<span class="badge bg-success">{{$activity->status}}</span> @endif 
                                                    @if($activity->status == "non soumis")<span class="badge bg-secondary">{{$activity->status}}</span> @endif 

                                                </td>
                                                <td>
                                                    <a href="{{ route('encadreur.show_activity', $activity) }}" class="btn btn-info d-none d-md-inline-block text-white">Voir plus
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
                </div>
            </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                


@endsection