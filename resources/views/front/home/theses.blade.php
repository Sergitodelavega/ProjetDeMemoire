@extends('front.app')
@section('content')
 <!-- Header-->
<header class="text-black" style="padding: 20px 0; background-image: url('/public/front/img/livre-bibliotheque-manuel-ouvert.jpg')">
    <div class="container text-center">
        <h3 class="fw-bolder" style="color: #2A8C28">Thèses soutenues</h3>
        <p class="lead">Vous pouvez consulter toutes les thèses soutenues dans nos écoles doctorales.</p>
    </div>
    
</header>


<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            <div class="category shuffle-item shuffle-item--visible" style="opacity: 1;  transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                <div class="card">
                  <div class="card-header" data-bs-toggle="collapse" href="#categoryImages" role="button" aria-expanded="false" aria-controls="categoryImages">
                    <span class="item-filter-text">Domaines</span>
                  </div>
                  <div class="card-body collapse show" id="categoryImages">
                    <ul class="list-items">
                          <li class="list-item" data-id="img-fluid" data-clipboard-text="img-fluid">
                            <div class="list-item-content">
                              <a href="#img-fluid" class="list-item-text">
                                <span class="item-filter-text">Sciences et Technologies</span>
                              </a>
                            </div>
                          </li> 
                          <li class="list-item" data-id="img-fluid" data-clipboard-text="img-fluid">
                            <div class="list-item-content">
                              <a href="#img-fluid" class="list-item-text">
                                <span class="item-filter-text">Médecine </span>
                              </a>
                            </div>
                          </li> 
                          <li class="list-item" data-id="img-fluid" data-clipboard-text="img-fluid">
                            <div class="list-item-content">
                              <a href="#img-fluid" class="list-item-text">
                                <span class="item-filter-text">Agronomie </span>
                              </a>
                            </div>
                          </li>
                          <li class="list-item" data-id="img-fluid" data-clipboard-text="img-fluid">
                            <div class="list-item-content">
                              <a href="#img-fluid" class="list-item-text">
                                <span class="item-filter-text">Sciences humaines </span>
                              </a>
                            </div>
                          </li>
                          <li class="list-item" data-id="img-fluid" data-clipboard-text="img-fluid">
                            <div class="list-item-content">
                              <a href="#img-fluid" class="list-item-text">
                                <span class="item-filter-text">Administration </span>
                              </a>
                            </div>
                          </li>
                    </ul>
                  </div>
                </div>
            </div>
            <br>
            
        </div>
        <div class="col-9">
            @foreach ($theses as $these)
            <div class="content">
                        {{-- <div class="card mb-4 mh-100">
                            <div class="row g-0">
                              <div class="col-7 col-sm-9">
                                <div class="card-body">
                                  <a class="text-decoration-none" href="{{ route('theses.show', ['id'=>$memoire["id"]]) }}"><h6 class="text-black">{{ $memoire->title }}</h6></a>
                                  <p class="card-text">{{ $memoire->type }}</p>
                                  <p class="card-text"><small class="text-muted">{{ $memoire->domain }}</small></p>
                                </div>
                              </div>
                            </div>
                        </div> --}}
                        <div class="card mb-4">
                            <div class="card-body">
                                <a class="text-decoration-none" href="{{ route('theses.show', ['id'=>$these["id"]]) }}"><h6 class="text-black">{{ $these->title }}</h6></a>
                                <div style="display: flex;">
                                    <p style="margin-right: 30px;" class="card-text">{{ $these->doctorant->user->name }}</p>
                                    <p style="margin-right: 30px;" class="card-text">Année : <small class="text-muted">2023</small></p>
                                    <p class="card-text">Spécialité : <em class="text-muted">{{ $these->doctorant->specialite }}</em></p>
                                </div>
                            </div>
                        </div>         
            </div>
    @endforeach
        </div>
    </div>
</div>
@endsection