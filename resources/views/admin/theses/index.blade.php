@extends('back.appback')
@section('title', 'Theses')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Thèses</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('admin.create.these') }}" title="Ajouter une thèse"  class="btn btn-primary">Ajouter une thèse</a>
        </p>
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
                            {{-- <h4 class="card-title">Basic Table</h4>
                            <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Titre</th>
                                            <th class="border-top-0">Doctorant assigné</th>
                                            <th class="border-top-0">Encadreur assigné</th>
                                            <th class="border-top-0">Deadline</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($theses as $these)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('admin.theses.show', $these->id) }}">{{ $these->title }}</a></td>
                                            <td>{{ $these->doctorant->user->name }}</td>
                                            <td>
                                              {{ $these->encadreur->user->name }}
                                            </td>
                                            <td>{{ $these->deadline }}</td>
                                            <td>
                                                @if($these->status == "open")<span class="badge bg-primary">{{$these->status}}</span> @endif
                                                @if($these->status == "completed")<span class="badge bg-success">{{$these->status}}</span> @endif 
                                            <td>
                                                <a href="{{ route('admin.theses.edit', $these) }}" class="btn btn-warning d-none d-md-inline-block text-white">Edit
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