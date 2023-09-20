@extends('back.appback')
@section('title', 'ProfilEncadreur')
@section('content')
  
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
                                                <th class="border-top-0">Nom et Prénoms</th>
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