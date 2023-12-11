@extends('back.appback')
@section('title', 'Formations')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Formations</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="" title="Ajouter une formation"  class="btn btn-info" style="color: white; font-size:20px;" data-bs-toggle="modal" data-bs-target="#mediumModal">Ajouter une formation</a>
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
                                <a href="#" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#mediumModal2-{{$formation->id}}"><i class="mdi mdi-pencil"></i>Modifier</a>
                                <a href="#" class="btn btn-danger text-white" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#staticModal-{{$formation->id}}"><i class="mdi mdi-delete"></i>Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach                          
            </div>
        </div>

        <!-- modal medium -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel" style="font-size: 30px;">Formulaire d'ajout d'une formation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.store.formation') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title" class="col-md-12 mb-0 lead" style="color: black;">Titre</label>
                                        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder=""
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("title"){{ $message }}@enderror</span>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="date_heure" class="col-md-12 lead" style="color: black;">Date et Heure</label>
                                        <input type="datetime-local" name="date_heure" id="date_heure" value="{{ old('date_heure') }}" placeholder=""
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("date_heure"){{ $message }}@enderror</span>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="location" class="col-md-12 lead" style="color: black;">Lieu</label>
                                        <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder=""
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("location"){{ $message }}@enderror</span>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="description" class="col-md-12 mb-0 lead" style="color: black;">Description</label>
                                        <textarea name="description" id="description" value="{{ old('description') }}" required rows="8"
                                                class="form-control ps-0 form-control-line"></textarea>
                                        <span class="alert-danger">@error("description"){{ $message }}@enderror</span>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="image" class="col-md-12 lead" style="color: black;">Image</label>
                                        <input type="file" name="image"
                                                class="form-control ps-0 form-control-line">    
                                        <span   span class="alert-danger">@error("image"){{ $message }}@enderror</span>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white" style="font-size: 20px; margin: 0 auto;">Ajouter</button>
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
<div class="modal fade" id="mediumModal2-{{$formation->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Modifier un évènement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Titre</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="titre" value="{{$formation->title}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Date et heure</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="datetime-local" id="password-input" title="{{$formation->date_heure}}" value="{{$formation->date_heure}}" name="date_heure" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Lieu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="lieu" value="{{$formation->location}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="textarea-input" rows="9"  class="form-control" required>{{$formation->description}}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">Image</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-input" name="image" class="form-control-file">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-sm" style="font-size: 1.3em">
                                <i class="zmdi zmdi-edit"></i> Modifier
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal medium -->

@endsection