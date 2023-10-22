@extends('back.appback')
@section('title', 'showTheses')
@section('content')

        <div class="container-fluid">

            <div class="row">
                <!-- column -->
                <div class="col-lg-8 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-header h2">{{ $these->title }}</div>
                        <div class="card-body">
                            <p class="lead">{{ $these->description }}</p>
                        
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-header h4">Informations</div>
                        <div class="card-body">
                            <p class="card-title">{{ $these->deadline }}</p>
                            <p class="card-title">{{ $these->created_at }}</p>
                            <p class="card-title"><span class="badge bg-secondary">{{ $these->status }}</span></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header h4">Fichiers</div>
                        <div class="card-body">
                        @foreach ($these->doctorant->activities as $activity)
                            @foreach ($activity->fichiers as $file)
                                <p class="lead">{{ $activity->semestre }} - {{ $file->link }}</p>
                            @endforeach
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection