@extends('back.appback')
@section('title', 'ProfilAdmin')
@section('content')

<?php 
if (auth()->check()) {
    // L'utilisateur est connecté, vous pouvez accéder à sa session
    $userLoger = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
}
?>
<div class="container-fluid">
    <div class="row" style="padding-top:20px;">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body profile-card">
                    <center class="mt-4"> 
                        <img src="{{ asset('storage/'.$userLoger->photo) }}" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-2">{{ $userLoger->name }}</h4>
                        <h6 class="card-subtitle">{{ $userLoger->email }}</h6>  
                        <h4 class="card-title mt-2">{{ $userLoger->ecole->name }}</h4> 
                    </center>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="form-horizontal form-material mx-2">
                        <form action="{{ route('update_email', $userLoger->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="email" class="col-md-12">Email</label>
                                <input type="email" value="{{ $userLoger->email }}" class="form-control ps-0 form-control-line" name="email" id="email">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span> 
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Modifier</button>
                            </div>
                        </form>

                        <form action="{{ route('update_password', $userLoger->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Ancien mot de passe</label>
                                <input type="password" class="form-control ps-0 form-control-line" name="old" required>
                                <span class="text-danger">@error('old'){{$message}}@enderror</span>       
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Nouveau mot de passe</label>
                                <input type="password" class="form-control ps-0 form-control-line" name="password" required>
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>       
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Confirmer mot de passe</label>
                                <input type="password" class="form-control ps-0 form-control-line" name="confirm" required>
                                <span class="text-danger">@error('confirm'){{$message}}@enderror</span>       
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Changer mot de passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>


      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


@endsection