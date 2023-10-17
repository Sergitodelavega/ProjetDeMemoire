@extends('back.appback')
@section('title', 'MesDoctorants')
@section('content')
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
   <!-- ============================================================== -->
   <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Basic Table</h4>
                    <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                    <div class="table-responsive">
                        <table class="table user-table">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Nom et Prénoms</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Année</th>
                                    <th class="border-top-0">Spécialité</th>
                                    <th class="border-top-0">Opérations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctorants as $doctorant)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $doctorant->user->name }}</td>
                                            <td>{{ $doctorant->user->email }}</td>
                                            <td>{{ $doctorant->year }}</td>
                                            <td>
                                              {{ $doctorant->specialite }}
                                            </td>
                                            
                                            <td>
                                                <a href="{{ route('encadreur.doctorant.show', $doctorant->id) }}" class="btn btn-info d-none d-md-inline-block text-white">Voir profil
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
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>

@endsection