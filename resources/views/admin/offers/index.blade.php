@extends('back.appback')
@section('title', 'Offers')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Offres de thèse</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('offers.create') }}" title="Ajouter une offre"  class="btn btn-primary">Ajouter une offre</a>
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
                                            <td><a class="btn btn-info mx-auto mx-md-0 text-white" href="{{ route('offers.edit', $offer) }}">Modifier</a></td>
                                            <td>
                                                <!-- Formulaire pour supprimer un Post : "posts.destroy" -->
                                                <form method="POST" action="{{ route('offers.destroy', $offer) }}" >
                                                    <!-- CSRF token -->
                                                    @csrf
                                                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                                    @method("DELETE")
                                                    <input  class="btn btn-danger mx-auto mx-md-0 text-white" type="submit" value="Supprimer" >
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