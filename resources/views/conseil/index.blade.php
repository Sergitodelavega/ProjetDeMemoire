@extends('back.appback')
@section('title', 'EspaceAdmin')
@section('content')
 
   <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Écoles Doctorales</h3>
                </div>
                <div>
                    <hr class="mt-0 mb-0">
                </div>
                <div class="card-body text-center ">
                    <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                        <li class="me-4">
                            <a href="{{ route('conseil.ecoles') }}"><h6 class="text-success" style="font-size: 50px;">12</h6></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Doctorants</h3>
                </div>
                <div>
                    <hr class="mt-0 mb-0">
                </div>
                <div class="card-body text-center ">
                    <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                        <li class="me-4">
                            <a href="{{ route('conseil.doctorant') }}"><h6 class="text-success" style="font-size: 50px;">1588</h6></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Directeurs de thèse</h3>
                </div>
                <div>
                    <hr class="mt-0 mb-0">
                </div>
                <div class="card-body text-center ">
                    <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                        <li class="me-4">
                            <a href="{{ route('conseil.encadreur') }}"><h6 class="text-success" style="font-size: 50px;">120</h6></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Thèses en préparation</h3>
                </div>
                <div>
                    <hr class="mt-0 mb-0">
                </div>
                <div class="card-body text-center ">
                    <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                        <li class="me-4">
                            <h6 class="text-success" style="font-size: 50px;">30</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Thèses terminées</h3>
                </div>
                <div>
                    <hr class="mt-0 mb-0">
                </div>
                <div class="card-body text-center ">
                    <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                        <li class="me-4">
                            <h6 class="text-success" style="font-size: 50px;">50</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Thèses en instance</h3>
                </div>
                <div>
                    <hr class="mt-0 mb-0">
                </div>
                <div class="card-body text-center ">
                    <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                        <li class="me-4">
                            <h6 class="text-success" style="font-size: 50px;">10</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Écoles Doctorales</h3>
                </div>
                <div>
                    <hr class="mt-0 mb-0">
                </div>
                <div class="card-body text-center ">
                    <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                        <li class="me-4">
                            <h6 class="text-success" style="font-size: 50px;">18</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Laboratoires de recherche</h3>
                </div>
                <div>
                    <hr class="mt-0 mb-0">
                </div>
                <div class="card-body text-center ">
                    <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                        <li class="me-4">
                            <h6 class="text-success" style="font-size: 50px;">40</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    
</div>


@endsection