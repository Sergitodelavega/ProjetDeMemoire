@extends('front.app')
@section('content')

<?php

use Illuminate\Support\Str;

?>
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('front/img/accueil.jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1 style="color:black; font-size:50px;">Plateforme Numérique Doctorale </h1>
          </div>
      </div>

      <div class="carousel-item" data-bs-interval="10000">
        <img src="{{ asset('front/img/eres0.6b045dcd.jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1 style="color:black; font-size:50px;">Plateforme Numérique Doctorale </h1>
          </div>
      </div>
      
      <div class="carousel-item" data-bs-interval="10000">
        <img src="{{ asset('front/img/personnes-diplomees-diplomes-close-up1.jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1 style="color:black; font-size:50px;">Plateforme Numérique Doctorale </h1>
          </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- ======= Events Section ======= -->
  <section id="portfolio" class="portfoio">
    <div class="container">

      <div class="section-title">
        <h2>Actualités et Évènements</h2>
        <p>Découvrez toutes les actualités et évènements.</p>
      </div>
        <div class="row">
          @foreach($posts as $post)
              <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- Première card -->
                <div class="card">
                  <img src="{{ asset('storage/'.$post->picture) }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title"><a class="text-black" href="{{ route('post.show', $post)}}">{{ $post->title }}</a></h5>
                    <p class="card-text">{{ Str::limit($post->content, $limit = 100, $end = '...') }}</p>
                    <p class="card-text"><small class="text-muted">Publié {{ $post->created_at->diffForHumans() }}</small></p>
                    <a href="{{ route('post.show', $post)}}" class="btn btn-danger" style="font-size: 13px;">Lire la suite</a>
                  </div>
                </div>
              </div>
          @endforeach
        </div>
      

        <div style="text-align: center; margin-top : 50px; ">
          <a href="{{ route('posts') }}" class="btn btn-danger" style="font-size:20px;">Voir tous les évènements</a>
        </div>

        
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    </div>
  </section><!-- End Portfoio Section -->

       <!-- ======= Offres Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Offres de thèses</h2>
          <p>Découvrez toutes les offres de thèse récentes des écoles doctorales.</p>
        </div>

        <div class="row">
          @foreach ($offers as $offer)
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
              <div class="icon-box">
                <h4><a href="#">{{ $offer->name }}</a></h4>
                <p>{{ Str::limit($offer->details, $limit = 200, $end = '...')  }}</p>
                <p class="text-muted">{{ $offer->ecole->name }}</p>
              </div>
            </div>
          @endforeach
        </div>

      </div>

    </section><!-- End Services Section -->



     <!-- ======= Frequently Asked Questions Section ======= -->
     <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Foire Aux Questions</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li>
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Comment postuler aux appels d'offres sur la plateforme ?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
       

    1- Rendez-vous sur la page d'accueil de la plateforme numérique doctorale. <br>
    
    2- Naviguez vers la section "Appels d'offres" ou "Offres de thèse".  <br>

    3- Parcourez la liste des appels d'offres disponibles. <br>
    4- Sélectionnez une offre de thèse. <br>
5- Lire les détails de l'appel d'offres : <br>

6- Postuler à l'appel d'offres :
    Si vous êtes intéressé par l'appel d'offres, recherchez le bouton ou le lien "Postuler" ou "Candidater" sur la page de l'appel d'offres.
    Cliquez sur ce bouton pour accéder au formulaire de candidature.

                </p>
              </div>
            </li>

            <li>
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Comment consulter et s'inscrire aux évènements des écoles doctorales ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
Recherchez la section "Événements". <br>
Parcourez la liste des événements disponibles. <br>
Cliquez sur le titre de l'événement qui vous intéresse pour obtenir plus de détails. <br>
Lisez les informations fournies sur l'événement, y compris la date, l'heure, le lieu, les objectifs, les intervenants, etc. <br>
Cliquez sur le bouton "S'inscrire" pour accéder au formulaire d'inscription. <br>
Remplissez le formulaire d'inscription en fournissant toutes les informations demandées. <br>
                </p>
              </div>
            </li>

            <li>
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Comment accéder à mon espace membre ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Trouvez le lien de connexion <br>
                  Entrez vos informations de connexion <br>
                  Cliquez sur le bouton de connexion <br>
                  Accès à votre espace membre <br>
                  Naviguez dans votre espace membre <br>
                  Déconnexion
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

@endsection