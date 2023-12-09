@extends('back.appback')
@section('title', 'Offers')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Offres de thèse</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('offers.create') }}" title="Ajouter une offre"  class="btn btn-info" style="color: white;" data-bs-toggle="modal" data-bs-target="#mediumModal">Ajouter une offre</a>
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
                                            <td><a href="{{ route('offers.show', $offer) }}" data-bs-toggle="modal" data-bs-target="#monModal-{{ $offer->id }}">{{ $offer->name }}</a></td>
                                            <td><a class="btn btn-warning mx-auto mx-md-0 text-white" href="{{ route('offers.edit', $offer) }}" data-bs-toggle="modal" data-bs-target="#mediumModal2-{{$offer->id}}"><i class="mdi mdi-pencil"></i></a></td>
                                            <td>
                                                <form method="POST" action="{{ route('offers.destroy', $offer) }}" >
                                                    <!-- CSRF token -->
                                                    @csrf

                                                    @method("DELETE")
                                                    <button class="btn btn-danger mx-auto mx-md-0 text-white" type="submit"><i class="mdi mdi-delete"></i></button>
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

        <!-- modal medium -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel" style="font-size: 30px;">Formulaire d'ajout d'une offre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <form method="POST" action="{{ route('offers.store') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for="name" class="col-md-12 mb-0">Intitulé</label>
                                                <input type="text" name="name" id="name"  value="{{ old('name') }}" required
                                                        class="form-control ps-0 form-control-line">
                                                <span class="alert-danger">@error("name"){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="domaine" class="col-md-12 mb-0">Domaine</label>
                                                <input type="text" name="domaine" id="domaine"  value="{{ old('domaine') }}" required
                                                        class="form-control ps-0 form-control-line">
                                                <span class="alert-danger">@error("domaine"){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="deadline" class="col-md-12 mb-0">Date limite</label>
                                                <input type="date" name="deadline" id="deadline"  value="{{ old('deadline') }}" required
                                                        class="form-control ps-0 form-control-line">
                                                <span class="alert-danger">@error("deadline"){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="details" class="col-md-12 mb-0">Details</label>
                                                <textarea name="details" id="details" value="{{ old('details') }}" required rows="8" cols="50"
                                                        class="form-control ps-0 form-control-line">{{ old('details') }}
                                                </textarea>
                                                <span class="alert-danger">@error("details"){{ $message }}@enderror</span>
                                            </div>
                    
                                            <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white" style="font-size: 20px;">Valider</button>
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
<div class="modal fade" id="mediumModal2-{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Modifier une offre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Le formulaire est géré par la route "posts.update" -->
                                <form method="POST" action="{{ route('offers.update', $offer) }}" enctype="multipart/form-data" >
                                    @csrf
                                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                                    @method('PUT')
            
                                    <div class="form-group">
                                        <label for="name" class="col-md-12 mb-0">Intitulé</label>
                                        <input type="text" name="name" id="name"  value="{{ isset($offer->name) ? $offer->name : old('name') }}" required
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("name"){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="domaine" class="col-md-12 mb-0">Domaine</label>
                                        <input type="text" name="domaine" id="domaine"  value="{{ isset($offer->domaine) ? $offer->domaine : old('domaine') }}" required
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("domaine"){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="deadline" class="col-md-12 mb-0">Date limite</label>
                                        <input type="date" name="deadline" id="deadline"  value="{{ isset($offer->deadline) ? $offer->deadline : old('deadline') }}" required
                                                class="form-control ps-0 form-control-line">
                                        <span class="alert-danger">@error("deadline"){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="details" class="col-md-12 mb-0">Details</label>
                                        <textarea name="details" id="details" value="{{ old('details') }}" required rows="8" cols="50"
                                                class="form-control ps-0 form-control-line">{{ isset($offer->details) ? $offer->details : old('details') }}
                                        </textarea>
                                        <span class="alert-danger">@error("details"){{ $message }}@enderror</span>
                                    </div>
            
                                    <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white">Valider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="monModal-{{ $offer->id }}" tabindex="-1" role="dialog" aria-labelledby="monModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Contenu de votre modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="monModalLabel">Détails d'une offre</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h1>{{ $offer->name }}</h1>
            <div class="form-group">
                <p>{{ $offer->domaine }}</p>
            </div>
            <div class="form-group">
                <p>{{ $offer->deadline }}</p>
            </div>
            <div class="form-group">
                <p>{{ $offer->details }}</p>
            </div>
        </div>
      </div>
    </div>
  </div>

  
@endsection