@extends('back.appback')
@section('title', "Créer une thèse")
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store.these', $doctorant->id) }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0">Intitulé de thèse</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder=""
                                    class="form-control ps-0 form-control-line">
                            <span class="alert-danger">@error("title"){{ $message }}@enderror</span> 
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-12 mb-0">Description</label>
                            <div class="col-md-12">
                                <textarea name="description" id="description" required rows="4"
                                    class="form-control ps-0 form-control-line">{{ old('description') }}</textarea>
                            </div>
                            <span class="alert-danger">@error("description"){{ $message }}@enderror</span>
                        </div>

                        
                        {{-- <div class="form-group">
                            <label for="deadline" class="col-md-12">Date limite</label>
                            <div class="col-md-12">
                                <input type="date" name="deadline" id="deadline" value="{{ old('date') }}" placeholder=""
                                    class="form-control ps-0 form-control-line">
                                    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("date")
                            <div>{{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="status" class="col-md-12">Statut</label>
                            <div class="col-md-12">
                                <select name="status" id="status" class="form-control ps-0 form-control-line">
                                    @foreach(App\Models\These::STATUS as $status)
                                    <option
                                        value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("status")
                            <div>{{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="encadreur_id" class="col-md-12">Encadreur assigné</label>
                            <div class="col-md-12">
                                <select name="encadreur_id" id="encadreur_id" class="form-control ps-0 form-control-line" required>
                                    @foreach($encadreurs as $encadreur)
                                    <option
                                        value="{{ $encadreur->id }}" {{ old('encadreur_id') == $encadreur->id ? 'selected' : '' }}>{{ $encadreur->user->name }}</option>
                                    @endforeach
                                </select>    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("encadreur_id")
                            <div>{{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="doctorant_id" class="col-md-12">Doctorant assigné</label>
                            <div class="col-md-12">
                                <select name="doctorant_id" id="doctorant_id" class="form-control ps-0 form-control-line" required>
                                    @foreach($doctorants as $doctorant)
                                    <option value="{{ $doctorant->id }}"  {{ old('doctorant_id') == $doctorant->id ? 'selected' : '' }}>{{ $doctorant->user->name }}</option>
                                    @endforeach
                                </select>    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("doctorant_id")
                            <div>{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
