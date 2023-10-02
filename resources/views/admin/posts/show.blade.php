@extends('back.appback')
@section('title', 'Posts')
@section('content')

    <div class="container-fluid">
        <h1>{{ $post->title }}</h1>

    <div class="form-group">
        <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

    </div>
	<div><p>
        {{ $post->content }}</p></div>

	<p><a class="btn btn-primary mx-auto mx-md-0 text-white" href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
    </div>


@endsection