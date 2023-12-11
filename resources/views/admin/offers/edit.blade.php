@extends('back.appback')
@section('title', "Créer une offre")
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                {{-- <div class="card-body">
                    <!-- Si nous avons un Post $post -->
                    @if (isset($offer))

                    <!-- Le formulaire est géré par la route "posts.update" -->
                    <form method="POST" action="{{ route('offers.update', $offer) }}" enctype="multipart/form-data" >

                        <!-- <input type="hidden" name="_method" value="PUT"> -->
                        @method('PUT')

                    @else

                    <form method="POST" action="{{ route('offers.store') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">

                    @endif

                        @csrf
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
                </div> --}}
            </div>
        </div>
    </div>           
</div> 

@endsection
