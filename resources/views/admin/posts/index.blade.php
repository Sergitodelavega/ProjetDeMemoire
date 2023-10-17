@extends('back.appback')
@section('title', 'Posts')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Publications</h1><br>
        <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('posts.create') }}" title="Ajouter un post"  class="btn btn-info" style="color: white;">Ajouter une publication</a>
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
                                            <td><a class="btn btn-warning mx-auto mx-md-0 text-white" href="{{ route('posts.edit', $post) }}"><i class="mdi mdi-pencil"></i></a></td>
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


@endsection