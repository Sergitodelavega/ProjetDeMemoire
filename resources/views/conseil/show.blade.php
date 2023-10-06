@extends('back.appback')
@section('content')
    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Écoles Doctorales</h1>
    </div>

        <!-- Le tableau pour lister les doctorants -->

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                @include('conseil.ecoles', ['ecoles' => $ecoles])

                <div class="col-lg-8 col-xlg-9">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                                    role="tab">Doctorants<span style="margin-left: 10px; border-radius : 50px; padding: 5px 5px; color:white; background-color: #1E88E5;">{{ count($doctorants) }}</span>
                                </li></a>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile"
                                    role="tab">Directeurs<span style="margin-left: 10px; border-radius : 50px; padding: 5px 5px; color:white; background-color: #1E88E5;">{{ count($encadreurs) }}</span></a></li>

                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#three"
                                role="tab">Thèses<span style="margin-left: 10px; border-radius : 50px; padding: 5px 5px; color:white; background-color: #1E88E5;">{{ count($theses) }}</span></a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#four"
                                    role="tab">Laboratoires<span style="margin-left: 10px; border-radius : 50px; padding: 5px 5px; color:white; background-color: #1E88E5;">{{ count($laboratoires) }}</span></a> 
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table user-table">
                                            <thead>
                                                <tr scope="row">
                                                    <th class="border-top-0">Nom</th>
                                                    <th class="border-top-0">Email</th>
                                                    <th class="border-top-0">Spécialité</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($doctorants as $doctorant)
                                                <tr>
                                                    <td>
                                                        {{ $doctorant->name }}
                                                    </td>
                                                    <td>
                                                        {{ $doctorant->email }}
                                                    </td>
                                                    <td>
                                                        {{ $doctorant->doctorant->specialite }}
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-secondary d-none d-md-inline-block text-white">Plus
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--second tab-->
                            <div class="tab-pane" id="profile" role="tabpanel">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table user-table">
                                            <thead>
                                                <tr scope="row">
                                                    <th class="border-top-0">Intitulé</th>
                                                    <th class="border-top-0">Email</th>
                                                    <th class="border-top-0">Spécialité</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($encadreurs as $encadreur)
                                                <tr>
                                                    <td>
                                                        {{ $encadreur->name }}
                                                    </td>
                                                    <td>
                                                        {{ $encadreur->email }}
                                                    </td>
                                                    <td>
                                                        {{ $encadreur->encadreur->specialite }}
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-secondary d-none d-md-inline-block text-white">Plus
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- three tab-->
                            <div class="tab-pane" id="three" role="tabpanel">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table user-table">
                                            <thead>
                                                <tr scope="row">
                                                    <th class="border-top-0">Intitulé</th>
                                                    <th class="border-top-0">Statut</th>
                                                    <th class="border-top-0">Action</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($theses as $these)
                                                <tr>
                                                    <td>
                                                        {{ $these->title }}
                                                    </td>
                                                    <td>
                                                        {{ $these->status }}
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-secondary d-none d-md-inline-block text-white">Plus
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- four tab-->
                            <div class="tab-pane" id="four" role="tabpanel">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table user-table">
                                            <thead>
                                                <tr scope="row">
                                                    <th class="border-top-0">Nom</th>             
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($laboratoires as $laboratoire)
                                                <tr>
                                                    <td>
                                                        {{ $laboratoire->name }}
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
            </div>

        </div>

@endsection