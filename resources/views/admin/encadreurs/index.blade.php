@extends('back.appback')
@section('content')
    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Encadreurs</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('admin.create.encadreur') }}" title="Créer un encadreur"  class="btn btn-info" style="color: white; font-size:20px;" data-bs-toggle="modal" data-bs-target="#mediumModal">Créer un nouveau encadreur</a>
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
                                            <th class="border-top-0">Nom et Prénom</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Spécialité</th>
                                            <th class="border-top-0">Grade</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($encadreurs as $encadreur)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('admin.encadreur.profil', $encadreur->id) }}">{{ $encadreur->user->name }}</a></td>
                                            <td>{{ $encadreur->user->email }}</td>
                                            <td>
                                              {{ $encadreur->specialite }}
                                            </td>
                                            <td>
                                              {{ $encadreur->grade }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.encadreur.edit', $encadreur->id) }}" class="btn btn-warning d-none d-md-inline-block text-white" data-bs-toggle="modal" data-bs-target="#mediumModal2-{{$encadreur->id}}"><i class="mdi mdi-pencil"></i>
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

     <!-- modal de création -->
     <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel" style="font-size: 30px;">Formulaire de création d'un encadreur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.store.encadreur') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="col-md-12 mb-0 lead" style="color: black;">Nom et Prénoms</label>
                                            <input style="font-size: 15px;" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Johnathan Doe"
                                                    class="form-control ps-0 form-control-line">
                                            <span class="alert-danger">@error("name"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-md-12 mb-0 lead" style="color: black;">Email</label>
                                            <input style="font-size: 15px;" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="johnathan@admin.com"
                                                    class="form-control ps-0 form-control-line">
                                            <span class="alert-danger">@error("email"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="matricule" class="col-md-12 mb-0 lead" style="color: black;">Matricule</label>
                                            <input style="font-size: 15px;" type="text" name="matricule" id="matricule" value="{{ old('matricule') }}" placeholder="12345678"
                                                    class="form-control ps-0 form-control-line">
                                            <span class="alert-danger">@error("matricule"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="grade" class="col-md-12 mb-0 lead" style="color: black;">Grade</label>
                                            <input style="font-size: 15px;" type="text" name="grade" id="grade" value="{{ old('grade') }}" placeholder="Directeur de recherche"
                                                    class="form-control ps-0 form-control-line">
                                            <span class="alert-danger">@error("grade"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="specialite" class="col-md-12 mb-0 lead" style="color: black;">Spécialité</label>
                                            <input style="font-size: 15px;" type="text" name="specialite" id="specialite" value="{{ old('specialite') }}" placeholder="Informatique"
                                                    class="form-control ps-0 form-control-line">
                                            <span class="alert-danger">@error("specialite"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="photo" class="col-md-12 mb-0 lead" style="color: black;">Photo de profil</label>
                                            <input style="font-size: 15px;" type="file" name="photo" id="photo" value="{{ old('photo') }}" 
                                                    class="form-control ps-0 form-control-line">
                                            <span class="alert-danger">@error("photo"){{ $message }}@enderror</span>
                                        </div>
                                            <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white" style="font-size: 20px;">Créer le compte</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

            <!-- modal medium -->
{{-- <div class="modal fade" id="mediumModal2-{{$encadreur->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel" style="font-size: 30px;">Mettre à jour un encadreur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.encadreur.update', $encadreur->id) }}" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name" class="col-md-12 mb-0 lead" style="color: black;">Nom et Prénoms</label>
                                        <input style="font-size: 15px;" type="text" name="name" id="name" value="{{ isset($encadreur->user->name) ? $encadreur->user->name : old('name') }}" placeholder="Johnathan Doe"
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("name"){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-md-12 mb-0 lead" style="color: black;">Email</label>
                                        <input style="font-size: 15px;" type="email" name="email" id="email" value="{{ isset($encadreur->user->email) ? $encadreur->user->email : old('email') }}" placeholder="johnathan@admin.com"
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("email"){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="matricule" class="col-md-12 mb-0 lead" style="color: black;">Matricule</label>
                                        <input style="font-size: 15px;" type="text" name="matricule" id="matricule" value="{{ isset($encadreur->matricule) ? $encadreur->matricule : old('matricule') }}" placeholder="12345678"
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("matricule"){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="grade" class="col-md-12 mb-0 lead" style="color: black;">Grade</label>
                                        <input style="font-size: 15px;" type="text" name="grade" id="grade" value="{{ isset($encadreur->grade) ? $encadreur->grade : old('grade') }}" placeholder="Directeur de recherche"
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("grade"){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="specialite" class="col-md-12 mb-0 lead" style="color: black;">Spécialité</label>
                                        <input style="font-size: 15px;" type="text" name="specialite" id="specialite" value="{{ isset($encadreur->specialite) ? $encadreur->specialite : old('specialite') }}" placeholder="Informatique"
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("specialite"){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        @if (isset($encadreur->user->photo))
                                            <p>
                                                <span>Photo de profil actuelle</span><br>
                                                <img src="{{ asset('storage/'.$encadreur->user->photo) }}" style="max-height: 200px;" >
                                            </p>
                                        @endif
            
                                        <label for="photo" class="col-md-12 mb-0 lead" style="color: black;">Photo de profil</label>
                                        <input style="font-size: 15px;" type="file" name="photo" id="photo" value="{{ old('photo') }}" 
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("photo"){{ $message }}@enderror</span>
                                    </div>
                                        <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white" style="font-size: 20px;">Mettre à jour</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div> --}}


@endsection