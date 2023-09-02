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
          <div class="col-md-6 col-4 align-self-center">
              <div class="text-end upgrade-btn">
                  <a href="https://www.wrappixel.com/templates/materialpro/"
                      class="btn btn-danger d-none d-md-inline-block text-white" target="_blank">Upgrade to
                      Pro</a>
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
                                <center class="mt-4"> <img src="{{ asset('back/assets/images/users/4.jpg') }}"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2">{{ $doctorant->user->name }}</h4>
                                    <h6 class="card-subtitle">{{ $doctorant->user->email }}</h6>
                                    <h5 class="card-subtitle">{{ $doctorant->specialite }}</h5>
                                    ---------
                                    @if ($doctorant->encadreur)
                                    <h4>{{ $doctorant->encadreur->user->name }}</h4>
                                    @else
                                    <h4>Pas d'encadreur</h4>
                                    @endif
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                </div>
                <div class="row">
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
                                                <th class="border-top-0">Titre</th>
                                                <th class="border-top-0">Description</th>
                                                <th class="border-top-0">Status</th>
                                                
                                                <th class="border-top-0">Opération</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activities as $activity)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $activity->title }}</td>
                                                <td>{{ $activity->description }}</td>
                                                <td>
                                                    @if($activity->status == "en attente")<span class="badge bg-primary">{{$activity->status}}</span> @endif
                                                    @if($activity->status == "validée")<span class="badge bg-success">{{$activity->status}}</span> @endif 
                                                </td>>
                                                <td>
                                                    <a href="{{ route('admin.doctorant.profil', $doctorant->id) }}" class="btn btn-info d-none d-md-inline-block text-white">Voir plus
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