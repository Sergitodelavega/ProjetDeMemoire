@extends('back.appback')
@section('title', "Soumission d'une activité")
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Formulaire de soumission d'une activité</h3>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-md-6 col-4 align-self-center">
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store.these') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0">Titre</label>
                            <div class="col-md-12">
                                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder=""
                                    class="form-control ps-0 form-control-line">
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("title")
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-12 mb-0">Description</label>
                            <div class="col-md-12">
                                <textarea name="description" id="description" required rows="4"
                                    class="form-control ps-0 form-control-line">{{ old('description') }}</textarea>
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("description")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                       
                        <div class="form-group">
                            <label for="status" class="col-md-12">Status</label>
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
                        </div>

                      
                        <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
