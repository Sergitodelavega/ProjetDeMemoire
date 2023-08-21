<?php 

use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (auth()->check()) {
    // L'utilisateur est connecté, vous pouvez accéder à sa session
    $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
}


?>

<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav"><br>
          <ul id="sidebarnav">

            @if($user->role === "admin")
              <!-- User Profile-->
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('admin.index') }}" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                    class="hide-menu">Dashboard</span></a>
              </li>
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('admin.formations') }}" aria-expanded="false">
                      <i class="mdi me-2 mdi-table"></i><span class="hide-menu">Formations</span></a>
              </li>
              <li class="sidebar-item"> 
                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('admin.doctorant') }}" aria-expanded="false"><i class="mdi me-2 mdi-account"></i><span
                          class="hide-menu">Doctorants</span>
                </a>
              </li>

              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('admin.encadreur') }}" aria-expanded="false"><i class="mdi me-2 mdi-account"></i><span class="hide-menu">Encadreurs</span></a>
              </li>

              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('admin.theses') }}" aria-expanded="false"><i class="mdi me-2 mdi-earth"></i><span
                          class="hide-menu">Thèses</span></a>
              </li>
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('admin.users') }}" aria-expanded="false"><i class="mdi me-2 mdi-earth"></i><span
                    class="hide-menu">Gestion</span></a>
              </li>
            @endif

            @if($user->role === "encadreur")
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('encadreur.doctorant.index') }}" aria-expanded="false"><i class="mdi me-2 mdi-account"></i><span
                          class="hide-menu">Doctorants</span></a>
              </li>
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('encadreur.publications') }}" aria-expanded="false"><i
                    class="mdi me-2 mdi-book-open-variant"></i><span class="hide-menu">Publications</span></a>
              </li>
            @endif

            @if($user->role === "doctorant")
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="pages-error-404.html" aria-expanded="false"><i class="mdi me-2 mdi-help-circle"></i><span
                    class="hide-menu">Activités</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('doctorant.formation') }}" aria-expanded="false"><i class="mdi me-2 mdi-table"></i><span
                    class="hide-menu">Formations</span></a>
            </li>
            @endif
            
            <li class="text-center p-10 upgrade-btn">
                  <a href="{{ route('index') }}"
                      class="btn btn-warning text-white mt-4">Home Page</a>
            </li>
          </ul>

      </nav>
      <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
  <div class="sidebar-footer">
      <div class="row">
          <div class="col-4 link-wrap">
              <!-- item-->
              <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                      class="ti-settings"></i></a>
          </div>
          <div class="col-4 link-wrap">
              <!-- item-->
              <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                      class="mdi mdi-gmail"></i></a>
          </div>
          <div class="col-4 link-wrap">
              <!-- item-->
              <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                      class="mdi mdi-power"></i></a>
          </div>
      </div>
  </div>
</aside>