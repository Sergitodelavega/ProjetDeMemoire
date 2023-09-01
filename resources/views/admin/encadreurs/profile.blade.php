@extends('back.appback')
@section('title', 'ProfilEncadreur')
@section('content')

  <div class="page-breadcrumb">
      <div class="row align-items-center">
          <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Profil de {{ $encadreur->user->name }}</h3>
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
                                <center class="mt-4"> <img src="{{ asset('back/assets/images/users/5.jpg') }}"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2">{{ $encadreur->user->name }}</h4>
                                    <h6 class="card-subtitle">{{ $encadreur->user->email }}</h6>
                                    <h5 class="card-subtitle">{{ $encadreur->specialite }}</h5>
                                    <h5 class="card-subtitle">{{ $encadreur->grade }}</h5>
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
                                <h4 class="card-title">Ses doctorants</h4>
                                {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr scope="row">
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Nom et Preénoms</th>
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Spécialité</th>
                                                <th class="border-top-0">Opération</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctorants as $doctorant)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $doctorant->user->name }}</td>
                                                <td>{{ $doctorant->user->email }}</td>
                                                <td>
                                                  {{ $doctorant->specialite }}
                                                </td>
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