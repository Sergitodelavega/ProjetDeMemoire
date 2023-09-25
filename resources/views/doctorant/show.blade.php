@extends('back.appback')
@section('title', 'MessagesDoctorant')
@section('content')


<div class="container-fluid">
        <div class="row">
            <!-- Column -->
            @include('doctorant.users', ['encadreur' => $encadreur])
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                                role="tab">{{ $encadreur->user->name }}</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="card-body">
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            
                                            <p class="mt-2"> Salut monsieur. Comment allez-vous ? </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <p class="mt-2" style="background-color: #F2F4F8"> Ça va, merci et vous ? Vous avez jeté un coup d'oeil à la conférence que je vous ai proposé ?</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            
                                            <p class="mt-2"> Oui, c'est interessant. </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea name="description" id="description" required rows="3" cols="10"
                                                class="form-control ps-0 form-control-line">Message</textarea>
                                        </div>
                                        <!-- Le message d'erreur pour "name" -->
                                        @error("description")
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-info mx-auto mx-md-0 text-white">Envoyer</button>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</div>

@endsection