@extends('back.appback')
@section('title', 'MessagesEncadreur')
@section('content')


<div class="container-fluid">
        <div class="row">
            <!-- Column -->
            @include('encadreur.users', ['users' => $users, 'unread' => $unread])
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> 
                            <a class="nav-link active" data-bs-toggle="tab" href="#home"
                                role="tab">{{ $user->name }}</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="card-body conversations">
                                @if ($messages->hasMorePages())
                                    <div class="text-center">
                                        <a href="{{ $messages->nextPageUrl() }}" class="btn btn-light">Voir les messages précédents</a>
                                    </div>
                                @endif
                                @foreach (array_reverse($messages->items()) as $message)
                                    <div class="row">
                                        <div class="col-md-10 {{ $message->from->id !== $user->id ? 'offset-md-2 text-end' : '' }}">
                                            {{-- <strong>{{ $message->from->name }}</strong><br> --}}
                                            <p>{{ $message->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($messages->previousPageUrl())
                                    <div class="text-center">
                                        <a href="{{ $messages->previousPageUrl() }}" class="btn btn-light">Voir les messages suivants</a>
                                    </div>
                                @endif
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="content" id="description" required rows="3" cols="10"
                                                class="form-control ps-0 form-control-line {{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="Ecrivez votre message"></textarea>
                                        @if($errors->has('content'))
                                            <div class="invalid-feedback">{{ implode(',', $errors->get('content')) }}</div>
                                        @endif
                                        <div class="alert-danger">@error("description"){{ $message }}@enderror</div>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white">Envoyer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</div>

@endsection

{{-- <div class="sl-item">
    <div class="sl-right">
   
        <p class="mt-2" style="background-color: #F2F4F8"> Salut monsieur. Comment allez-vous ? </p>
    </div>
</div>
<hr>
<div class="sl-item">
    <div class="sl-right">
      
        <p class="mt-2"> Ça va, merci et vous ? Vous avez jeté un coup d'oeil à la conférence que je vous ai proposé ?</p>
    </div>
</div>
<hr>
<div class="sl-item">
    <div class="sl-right">
     
        <p class="mt-2" style="background-color: #F2F4F8"> Oui, c'est interessant. </p>
    </div>
</div>
<hr> --}}