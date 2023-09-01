@extends('back.appback')
@section('title', 'showTheses')
@section('content')

    <br>

        <!-- Le tableau pour lister les doctorants -->

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            {{-- <div class="row">
                <!-- column -->
                <div class="col-lg-6 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-header h5">Doctorant</div>
                        <div class="card-body">
                            <h6 class="card-title">{{ $these->doctorant->user->name }}</h6>
                            <h6 class="card-title">{{ $these->doctorant->user->email }}</h6>
                            <h6 class="card-title">{{ $these->doctorant->matricule }}</h6>
                            <h6 class="card-title">{{ $these->doctorant->specialite }}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-header h4">Encadreur</div>
                        <div class="card-body">
                            <h6 class="card-title">{{ $these->encadreur->user->name }}</h6>
                            <h6 class="card-title">{{ $these->encadreur->user->email }}</h6>
                            <h6 class="card-title">{{ $these->encadreur->matricule }}</h6>
                            <h6 class="card-title">{{ $these->encadreur->specialite }}</h6>
                            <h6 class="card-title">{{ $these->encadreur->grade }}</h6>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <!-- column -->
                <div class="col-lg-8 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-header h4">{{ $these->title }}</div>
                        <div class="card-body">
                            <p class="card-title">{{ $these->description }}</p>
                        
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
                </div>
            </div>
        </div>


@endsection