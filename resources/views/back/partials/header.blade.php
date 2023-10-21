<?php 

use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (auth()->check()) {
   $user = auth()->user(); 
}
?>

<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <div class="navbar-header" data-logobg="skin6">
          <!-- Logo -->
          <a class="navbar-brand ms-4" href="{{ route('index') }}">
              <!-- Logo icon -->
              <b class="logo-icon">
                  <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                  <!-- Dark Logo icon -->
                  <img src="{{ asset('back/assets/images/logo-light-icon.png') }}" alt="homepage" class="dark-logo" />

              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">
                  <!-- dark Logo text -->
                  {{-- <img src="{{ asset('back/assets/images/logo-light-text.png') }}" alt="homepage" class="dark-logo" /> --}}
              

              </span>
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
              href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <ul class="navbar-nav d-lg-none d-md-block ">
              <li class="nav-item">
                  <a class="nav-toggler nav-link waves-effect waves-light text-white "
                      href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
              </li>
          </ul>
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav me-auto mt-md-0 ">
            @if ($user->role === "admin")
              <li class="nav-item text-white" style="margin-left: 50px; font-size:20px">Espace Admin</li>
            @endif
            @if ($user->role === "encadreur")
              <li class="nav-item text-white" style="margin-left: 50px; font-size:20px">Espace Encadreur</li>
            @endif
            @if ($user->role === "doctorant")
              <li class="nav-item text-white" style="margin-left: 50px; font-size:20px">Espace Doctorant</li>
            @endif
            @if ($user->role === "conseil")
              <li class="nav-item text-white" style="margin-left: 50px; font-size:20px">Conseil Scientifique</li>
            @endif
          </ul>

          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav">
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      @if ($user->role === "admin")
                      <img src="{{ asset('storage/'.$user->photo) }}" alt="user" class="profile-pic me-2">{{ $user->name }}
                      @endif
                      @if ($user->role === "encadreur")
                      <img src="{{ asset('storage/'.$user->photo) }}" alt="user" class="profile-pic me-2">{{ $user->name }}
                      @endif
                      @if ($user->role === "doctorant")
                      <img src="{{ asset('storage/'.$user->photo) }}" alt="user" class="profile-pic me-2">{{ $user->name }}
                      @endif
                      @if ($user->role === "conseil")
                      <img src="{{ asset('storage/'.$user->photo) }}" class="profile-pic me-2">{{ $user->name }}
                      @endif
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if ($user->role === "conseil")
                      <li class="dropdown-item"><a href="{{ route('conseil.profil') }}"><i style="margin-right: 5px;" class="mdi mdi-account"></i> Profil</a></li>
                    @endif
                    @if ($user->role === "admin")
                      <li class="dropdown-item"><a href="{{ route('admin.profil') }}"><i style="margin-right: 5px;"  class="mdi mdi-account"></i>Profil</a></li>
                    @endif
                    @if ($user->role === "encadreur")
                      <li class="dropdown-item"><a href="{{ route('encadreur.profil') }}"><i style="margin-right: 5px;" class="mdi mdi-account"></i>Profil</a></li>
                    @endif
                    @if ($user->role === "doctorant")
                      <li class="dropdown-item"><a href="{{ route('doctorant.profil') }}"><i style="margin-right: 5px;" class="mdi mdi-account"></i>Profil</a></li>
                    @endif
                      <li class="dropdown-item">
                      @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="color: #1E88E5; border:none; background:white; outline:none; "><i style="margin-right: 5px;" class="mdi mdi-logout"></i>Déconnexion</button>
                        </form>
                      @endauth
                    </li>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
</header>