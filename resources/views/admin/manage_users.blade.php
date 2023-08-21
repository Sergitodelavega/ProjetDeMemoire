@extends('back.appback')
@section('content')
    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Gestion des utilisateurs</h1><br>
        {{-- <p>
        <!-- Lien pour créer un nouveau doctorant : "posts.create" -->
        <a href="{{ route('admin.create.encadreur') }}" title="Créer un encadreur"  class="btn btn-primary">Créer un nouveau encadreur</a>
        </p> --}}
    </div>

        <!-- Le tableau pour lister les utilisateurs -->

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
                                            <th class="border-top-0">Nom et Prénom</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Role</th>
                                            <th class="border-top-0">Opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                              {{ $user->role }}
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger d-none d-md-inline-block text-white">Bloquer
                                                </a>
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
    {{-- <table border="1" class="table table-hover">
        <thead>
            <tr>
                <th>Nom et Prénom</th>
                <th>Email</th>
                <th>Matricule</th>
                <th>Spécialité</th>
                <th>Date d'inscription</th>
            </tr>
        </thead>
        <tbody>
            <!-- On parcourt la collection de Doctorant -->
            @foreach ($doctorants as $doctorant)
            <tr>
                <td>
                    <!-- Lien pour afficher un Post : "posts.show" -->
                    {{-- <a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->title }}</a> --}}
                    {{-- {{ $doctorant->name }}
                </td>
                <td>{{ $doctorant->email }}</td>
                <td>{{ $doctorant->matricule }}</td>
                <td>{{ $doctorant->specialite }}</td>
                <td>{{ $doctorant->email }}</td>  --}}
                {{-- <td>
                    <!-- Lien pour modifier un Post : "posts.edit" -->
                    <a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" class="btn btn-warning">Modifier</a>
                </td> --}}
                {{-- <td>
                    <input type="submit" value="x Supprimer" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $post->id }}">
                    <!-- Formulaire pour supprimer un Post : "posts.destroy" -->
                    {{-- <form method="POST" action="{{ route('posts.destroy', $post) }}" >
                        <!-- CSRF token -->
                        @csrf
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        @method("DELETE")
                        <input type="submit" value="x Supprimer" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $post->id }}">
                    </form> --}}

                    <!-- Modal de confirmation de suppression -->
        {{-- <div class="modal fade" id="confirmDeleteModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $post->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel{{ $post->id }}">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce post ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
        </div>
        </div>
                </td>  --}}
            {{-- </tr>
            @endforeach
        </tbody>
</table> --}}

@endsection