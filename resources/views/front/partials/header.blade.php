<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="#"></a></h1>
      
      <a href="{{ route('index') }}" class="logo"><img src="{{ asset('front/img/téléchargement-removebg-preview.png') }}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('index') }}"><i class="bi bi-house"></i>Gouvernance</a></li>
          <li><a class="nav-link scrollto" href="#portfolio"><i class="bi bi-calendar-event"></i>Évènements</a></li>
          <li><a class="nav-link scrollto" href="#services"><i class="bi bi-hdd-rack"></i>Offres</a></li>
          <li><a class="nav-link scrollto" href="{{ route('theses') }}"><i class="bi bi-calendar-event"></i>Thèses</a></li>
          <li><a class="nav-link scrollto " href="#"><i class="bi bi-telephone-fill"></i>Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div class="cta d-none d-md-block">
        @guest
        {{-- <a href="{{ route('register') }}" class="scrollto" id="btn-i">S'inscrire</a> --}}
        <a href="{{ route('login') }}" class="scrollto"><i class="bi bi-person-fill"></i>Se connecter</a>
        @else
        <form id="logout" action="{{ route('logout') }}" method="POST">
          <a role="button" onclick="document.getElementById('logout').submit();" class="nav-link active">Déconnexion</a>
          @csrf
        </form>
        @endguest
      </div>
    </div>
  </header><!-- End Header -->