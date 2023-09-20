@extends('back.appback')
@section('title', 'MessagesEncadreur')
@section('content')


<div class="container-fluid">
        <div class="row">
            <!-- Column -->
            @include('encadreur.users', ['doctorants' => $doctorants])
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                                role="tab">{{ $doctorant->user->name }}</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="card-body">
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <div><a href="#" class="link">John Doe</a> <span class="sl-date">5
                                                    minutes ago</span>
                                                <p class="mt-2"> Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <div><a href="#" class="link">John Doe</a> <span class="sl-date">5
                                                    minutes ago</span>
                                                <p class="mt-2"> Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <div><a href="#" class="link">John Doe</a> <span class="sl-date">5
                                                    minutes ago</span>
                                                <textarea class="mt-2">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</div>

@endsection