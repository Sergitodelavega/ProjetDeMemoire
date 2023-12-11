@extends('back.appback')
@section('title', 'Posts')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Publications</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('posts.create') }}" title="Ajouter un post"  class="btn btn-info" style="color: white; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#mediumModal">Ajouter une publication</a>
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
                                            <th class="border-top-0">Titre</th>
                                            <th colspan="2" class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                                            <td><a class="btn btn-warning mx-auto mx-md-0 text-white" href="{{ route('posts.edit', $post) }}" data-bs-toggle="modal" data-bs-target="#mediumModal2-{{$post->id}}"><i class="mdi mdi-pencil"></i></a></td>
                                            <td>
                                                <!-- Formulaire pour supprimer un Post : "posts.destroy" -->
                                                <form method="POST" action="{{ route('posts.destroy', $post) }}" >
                                                    <!-- CSRF token -->
                                                    @csrf
                                                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                                    @method("DELETE")
                                                    <button  class="btn btn-danger mx-auto mx-md-0 text-white" type="submit"><i class="mdi mdi-delete"></i></button>
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
                    <h5 class="modal-title" id="mediumModalLabel" style="font-size: 30px;">Formulaire d'ajout d'une publication</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                
                                    <form method="POST" action="{{ route('posts.store') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title" class="col-md-12 mb-0">Titre</label>
                                            <div class="col-md-12">
                                                <input type="text" name="title" id="title"  value="{{old('title') }}"  placeholder=""
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                            @error("title")
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                
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
                                                    class="form-control ps-0 form-control-line">{{ old('content') }}</textarea>
                                            </div>
                                            <!-- Le message d'erreur pour "name" -->
                                            @error("content")
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                
                                        <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white" style="font-size: 18px;">Valider</button>
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
<div class="modal fade" id="mediumModal2-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="mediumModalLabel">Modifier une publication</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
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

<div class="modal fade" id="monModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="monModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <!-- Contenu de votre modal -->
    <div class="modal-header">
      <h5 class="modal-title" id="monModalLabel">Détails d'une publication</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div>
            <h1>{{ $post->title }}</h1>

        <div class="form-group">
            <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">
        </div>
	<div>
        <p>
        {{ $post->content }}</p></div>
    </div>
  </div>
</div>
</div>

@endsection