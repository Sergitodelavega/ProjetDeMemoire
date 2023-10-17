@extends('back.appback')
@section('title', 'Posts')
@section('content')

<div class="container-fluid">
        
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
	<p><a class="btn btn-info mx-auto mx-md-0 text-white" href="{{ route('offers.index') }}" title="Retourner aux articles" >Retourner aux offres</a></p>
    
</div>


@endsection