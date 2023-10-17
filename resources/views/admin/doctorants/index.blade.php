@extends('back.appback')
@section('content')
    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Doctorants</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('admin.create.doctorant') }}" title="Créer un doctorant"  class="btn btn-info" style="color: white;">Créer un compte doctorant</a>
        </p>
    </div>


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
                                        <tr scope="row">
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Nom et Prénomx</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Année</th>
                                            <th class="border-top-0">Date d'inscription</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctorants as $doctorant)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('admin.doctorant.profil', $doctorant->id) }}">{{ $doctorant->user->name }}</a></td>
                                            <td>{{ $doctorant->user->email }}</td>
                                            <td>
                                              {{ $doctorant->year }}
                                            </td>
                                            <td>
                                              {{ $doctorant->created_at->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.doctorant.edit', $doctorant) }}" class="btn btn-warning d-none d-md-inline-block text-white"><i class="mdi mdi-pencil"></i>
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

@endsection