@extends('front.app')
@section('content')
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('front/img/eres0.6b045dcd.jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1 style="color:black; font-size:50px;">Plateforme Numérique Doctorale </h1>
          </div>
      </div>
      <div class="carousel-item" data-bs-interval="10000">
        <img src="{{ asset('front/img/accueil.jpg') }}" class="d-block w-100" alt="...">
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
              <div class="col-lg-4 col-md-3 col-sm-6">
                <!-- Première card -->
                <div class="card">
                  <img src="{{ asset('front/img/uac-2.jpg') }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">Formations scientifiques pour un impact sur le développement</h5>
                    <p class="card-text">Les Centres d’Excellence d’Afrique pour l’Impact sur le développement...</p>
                    <p class="card-text"><small class="text-muted">Publié il y a 3 min</small></p>
                    <a href="#" class="btn btn-danger" style="font-size: 13px;">Lire la suite</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-6">
                <!-- Première card -->
                <div class="card">
                  <img src="{{ asset('front/img/jeunes-etudiants-frequentant-classe-universitaire.jpg') }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">Formations à l'Ecole Doctorale des Sciences Agronomiques et de l’Eau</h5>
                    <p class="card-text">De nouvelles offres de formation peuvent être ajoutées conformément...</p>
                    <p class="card-text"><small class="text-muted">Publié il y a 20 min</small></p>
                    <a href="#" class="btn btn-danger" style="font-size: 13px;">Lire la suite</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-6">
                <!-- Première card -->
                <div class="card">
                  <img src="{{ asset('front/img/Patrice-net-1.jpg') }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">Enseignement supérieur : Talon réorganise la création des écoles doctorales.</h5>
                    <p class="card-text">Le Chef de l'État a pris trois décrets pour réorganiser les écoles doctorales...</p>
                    <p class="card-text"><small class="text-muted">Publié il y a 1 heure</small></p>
                    <a href="#" class="btn btn-danger" style="font-size: 13px;">Lire la suite</a>
                  </div>
                </div>
              </div>
            </div>

        <div style="text-align: center; margin-top : 50px; ">
          <a href="#" class="btn btn-danger" style="font-size:20px;">Voir tous les évènements</a>
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
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <h4><a href="#">Appel à candidature pour le Doctorat au titre de l’année académique 2023-2024</a></h4>
              <p>Dans le cadre de ses activités académiques, le CoE-EIE lance un appel à candidature pour la bourse de thèse de doctorat pour le compte de l'année universitaire 2023-2024...</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <h4><a href="#">Doctorales des centres d’excellence du Bénin</a></h4>
              <p>Les Centres d’Excellence d’Afrique pour l’Impact sur le développement de l’Université d’Abomey-Calavi organisent, en collaboration avec les entités qui hébergent ces centres (IMSP, INE, EPAC) et les entités partenaires (IFRI, FAST, LABEF, ASE)...</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <h4><a href="#">Proposition de projet de thèse en sciences de l’éducation.</a></h4>
              <p>L'éducation est un pilier essentiel du développement d'une société, mais de nombreux élèves issus de milieux socio-économiques défavorisés sont confrontés à des obstacles qui entravent leur réussite scolaire...</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <h4><a href="#">Apprentissage en ligne utilisant Experience Replay destiné aux systèmes embarqués.</a></h4>
              <p>Les systèmes embarqués sont omniprésents dans la technologie moderne, des
                appareils IoT aux systèmes automobiles, et ils sont tenus de gérer diverses
                tâches...</p>
            </div>
          </div>
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
                  XXX
                </p>
              </div>
            </li>

            <li>
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Comment consulter et s'inscrire aux évènements des écoles doctorales ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  XXX
                </p>
              </div>
            </li>

            <li>
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Comment accéder à mon espace membre ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  XXX
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

@endsection