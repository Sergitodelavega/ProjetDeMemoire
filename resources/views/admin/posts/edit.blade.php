@extends('back.appback')
@section('title', "Créer un post")
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <!-- Si nous avons un Post $post -->
                    @if (isset($post))

                    <!-- Le formulaire est géré par la route "posts.update" -->
                    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" >

                        <!-- <input type="hidden" name="_method" value="PUT"> -->
                        @method('PUT')

                    @else

                    <form method="POST" action="{{ route('posts.store') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">

                    @endif

                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-12 mb-0">Titre</label>
                            <div class="col-md-12">
                                <input type="text" name="title" id="title"  value="{{ isset($post->title) ? $post->title : old('title') }}"  placeholder=""
                                    class="form-control ps-0 form-control-line">
                            </div>
                            @error("title")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        @if(isset($post->picture))
                        <div class="form-group">
                            <span class="col-md-12">Couverture actuellle</span>
                            <img src="{{ asset('storage/'.$post->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
                            <!-- Le message d'erreur pour "name" -->
                            @error("picture")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="picture" class="col-md-12">Couverture</label>
                            <div class="col-md-12">
                                <input type="file" name="picture" id="picture" value="{{ old('picture') }}"
                                    class="form-control ps-0 form-control-line">
                                    
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("picture")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content" class="col-md-12 mb-0">Contenu</label>
                            <div class="col-md-12">
                                <textarea name="content" id="content" value="{{ old('content') }}" required rows="8" cols="50"
                                    class="form-control ps-0 form-control-line">{{ isset($post->content) ? $post->content : old('content') }}</textarea>
                            </div>
                            <!-- Le message d'erreur pour "name" -->
                            @error("content")
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 

@endsection
