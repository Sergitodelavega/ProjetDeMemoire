@extends('back.appback')
@section('title', 'Activities')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Activities</h1><br>
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
                                            <th class="border-top-0">Titre</th>
                                            <th class="border-top-0">Semestre</th>
                                            <th class="border-top-0">Deadline</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('activities.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                            <td>{{ $activity->description }}</td>
                                            <td>{{ $activity->created_at }}</td>
                                            <td>
                                                @if($activity->status == "en attente")<span class="badge bg-primary">{{$activity->status}}</span> @endif
                                                @if($activity->status == "validée")<span class="badge bg-success">{{$activity->status}}</span> @endif 
                                            <td>
                                                @if ($activity->status == "validée")
                                                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-secondary d-none d-md-inline-block text-white">Details
                                                </a>
                                                @else
                                                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-secondary d-none d-md-inline-block text-white">Details
                                                </a>
                                                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-info d-none d-md-inline-block text-white">Soumettre
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