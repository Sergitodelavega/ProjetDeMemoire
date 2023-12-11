@extends('back.appback')
@section('content')
    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Doctorants</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('admin.create.doctorant') }}" title="Créer un doctorant"  class="btn btn-info" style="color: white; font-size:20px;" data-bs-toggle="modal" data-bs-target="#mediumModal">Créer un compte doctorant</a>
        </p>
    </div>


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
                                            <th class="border-top-0">Nom et Prénoms</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Année</th>
                                            <th class="border-top-0">Date d'inscription</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctorants as $doctorant)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('admin.doctorant.profil', $doctorant->id) }}">{{ $doctorant->user->name }}</a></td>
                                            <td>{{ $doctorant->user->email }}</td>
                                            <td>
                                              {{ $doctorant->year }}
                                            </td>
                                            <td>
                                              {{ $doctorant->created_at->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.doctorant.edit', $doctorant) }}" class="btn btn-warning d-none d-md-inline-block text-white"><i class="mdi mdi-pencil"></i>
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
                    <h5 class="modal-title" id="mediumModalLabel" style="font-size: 30px;">Formulaire de création d'un doctorant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.store.doctorant') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">                                        
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="col-md-12 mb-0 lead" style="color: black;">Nom et Prénoms</label>
                                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Johnathan Doe"
                                                    class="form-control ps-0 form-control-line" required>
                                            <span class="alert-danger">@error("name"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-md-12 lead" style="color: black;">Email</label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="johnathandoe@gmail.com"
                                                    class="form-control ps-0 form-control-line" required>      
                                            <span class="alert-danger">@error("email"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="matricule" class="col-md-12 lead" style="color: black;">Matricule</label>
                                            <input type="text" name="matricule" id="matricule" value="{{ old('matricule') }}" placeholder="12345678"
                                                    class="form-control ps-0 form-control-line" required>
                                            <span class="alert-danger">@error("matricule"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="specialite" class="col-md-12 mb-0 lead" style="color: black;">Spécialité</label>
                                            <input type="text" name="specialite" id="specialite" value="{{ old('specialite') }}" placeholder="Mathématiques"
                                                    class="form-control ps-0 form-control-line" required>
                                            <span class="alert-danger">@error("specialite"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="year_id" class="col-md-12 lead" style="color: black;">Année de thèse </label>
                                                <select name="year_id" id="year_id" class="form-control ps-0 form-control-line" required>
                                                    @foreach($years as $year)
                                                    <option
                                                        value="{{ $year->id }}" {{ old('year_id') == $year->id ? 'selected' : '' }}>{{ $year->year }}</option>
                                                    @endforeach
                                                </select>    
                                            <span class="alert-danger">@error("year_id"){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="laboratoire_id" class="col-md-12 lead" style="color: black;">Laboratoire </label>
                                                <select name="laboratoire_id" id="laboratoire_id" class="form-control ps-0 form-control-line" required>
                                                    @foreach($laboratoires as $laboratoire)
                                                    <option
                                                        value="{{ $laboratoire->id }}" {{ old('laboratoire->id') == $laboratoire->id ? 'selected' : '' }}>{{ $laboratoire->name }}</option>
                                                    @endforeach
                                                </select>    
                                            <span class="alert-danger">@error("laboratoire_id"){{ $message }}@enderror</span>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="photo" class="col-md-12 mb-0 lead" style="color: black;">Photo de profil</label>
                                            <input type="file" name="photo" id="photo" value= "{{ old('photo') }}" 
                                                    class="form-control ps-0 form-control-line">
                                            <span class="alert-danger">@error("photo"){{ $message }}@enderror</span>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="encadreur_id" class="col-md-12 lead" style="color: black;">Encadreur assigné</label>
                                                <select name="encadreur_id" id="encadreur_id" class="form-control ps-0 form-control-line" required>
                                                   
                                                    @foreach($encadreurs as $encadreur)
                                                    <option
                                                        value="{{ $encadreur->id }}" {{ old('encadreur_id') == $encadreur->id ? 'selected' : '' }}>{{ $encadreur->user->name }}</option>
                                                    @endforeach
                                                </select>    
                                            <span class="alert-danger">@error("encadreur_id"){{ $message }}@enderror</span>
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
@endsection