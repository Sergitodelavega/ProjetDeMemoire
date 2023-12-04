@extends('back.appback')
@section('title', 'Formations')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Formations</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('admin.create.formation') }}" title="Ajouter une formation"  class="btn btn-info" style="color: white;">Ajouter une formation</a>
        </p>
    </div>

        <!-- Le tableau pour lister les doctorants -->

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                @foreach ($formations as $formation )
                <div class="col-sm-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$formation->image) }}" class="card-img-top" alt="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title">{{ $formation->title }}</h4>
                            <p class="card-text h4"><small class="text-muted">{{ $formation->date_heure }}</small></p>
                            <div class="d-flex justify-content-end">
                                <a href="#" class="btn btn-warning"><i class="mdi mdi-pencil"></i>Modifier</a>

                                <form action="{{ route('admin.delete.formation', $formation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-white" style="margin-left: 10px"><i class="mdi mdi-delete"></i>Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach                          
            </div>
        </div>


@endsection