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

  <!-- ======= Portfoio Section ======= -->
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
                  <img src="{{ asset('front/img/portfolio-4.jpg') }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="#" class="btn btn-danger" style="font-size: 13px;">Lire la suite</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-6">
                <!-- Première card -->
                <div class="card">
                  <img src="{{ asset('front/img/portfolio-1.jpg') }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="#" class="btn btn-danger" style="font-size: 13px;">Lire la suite</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-6">
                <!-- Première card -->
                <div class="card">
                  <img src="{{ asset('front/img/portfolio-2.jpg') }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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

       <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Appels d'offres</h2>
          <p>Découvrez toutes les appels d'offres récents.</p>
        </div>

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h4><a href="#">Dolor Sitema</a></h4>
              <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h4><a href="#">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-brightness-high"></i>
              <h4><a href="#">Nemo Enim</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-calendar4-week"></i>
              <h4><a href="#">Magni Dolore</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4><a href="#">Eiusmod Tempor</a></h4>
              <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
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