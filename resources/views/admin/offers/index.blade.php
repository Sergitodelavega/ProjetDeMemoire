@extends('back.appback')
@section('title', 'Offers')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Offres de thèse</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('offers.create') }}" title="Ajouter une offre"  class="btn btn-info" style="color: white;">Ajouter une offre</a>
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
                                            <th class="border-top-0">Intitulé</th>
                                            <th colspan="2" class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offers as $offer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('offers.show', $offer) }}">{{ $offer->name }}</a></td>
                                            <td><a class="btn btn-warning mx-auto mx-md-0 text-white" href="{{ route('offers.edit', $offer) }}"><i class="mdi mdi-pencil"></i></a></td>
                                            <td>
                                                <form method="POST" action="{{ route('offers.destroy', $offer) }}" >
                                                    <!-- CSRF token -->
                                                    @csrf

                                                    @method("DELETE")
                                                    <button class="btn btn-danger mx-auto mx-md-0 text-white" type="submit"><i class="mdi mdi-delete"></i></button>
                                                </form>
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