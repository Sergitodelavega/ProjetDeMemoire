<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="#"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#">Publier</a></li>
          <li><a class="nav-link scrollto" href="#">Rechercher</a></li>
          <li><a class="nav-link scrollto " href="#">Faq</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div class="cta d-none d-md-block">
        @guest
        {{-- <a href="{{ route('register') }}" class="scrollto" id="btn-i">S'inscrire</a> --}}
        <a href="{{ route('login') }}" class="scrollto">Se connecter</a>
        @else
        <form id="logout" action="{{ route('logout') }}" method="POST">
          <a role="button" onclick="document.getElementById('logout').submit();" class="nav-link active">Déconnexion</a>
          @csrf
        </form>
        @endguest
      </div>
    </div>
  </header><!-- End Header -->