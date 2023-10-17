@extends('back.appback')
@section('title', 'Formations')
@section('content')

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
                                <a href="#" class="btn btn-secondary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach                          
            </div>
        </div>


@endsection