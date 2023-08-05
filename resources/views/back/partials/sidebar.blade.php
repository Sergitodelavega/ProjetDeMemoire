<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
          <ul id="sidebarnav">
              <!-- User Profile-->
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('admin.index') }}" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                          class="hide-menu">Admin Dashboard</span></a></li>
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="#" aria-expanded="false">
                      <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Formations</span></a>
              </li>
              <li class="sidebar-item"> 
                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('admin.doctorant') }}" aria-expanded="false"><i class="mdi me-2 mdi-table"></i><span
                          class="hide-menu">Doctorants</span>
                </a>
              </li>

              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('admin.encadreur') }}" aria-expanded="false"><i
                          class="mdi me-2 mdi-emoticon"></i><span class="hide-menu">Encadreurs</span></a>
              </li>

              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="map-google.html" aria-expanded="false"><i class="mdi me-2 mdi-earth"></i><span
                          class="hide-menu">Gestion</span></a></li>

              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="pages-blank.html" aria-expanded="false"><i
                          class="mdi me-2 mdi-book-open-variant"></i><span class="hide-menu">Encadreur Dashboard</span></a>
              </li>
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="pages-error-404.html" aria-expanded="false"><i class="mdi me-2 mdi-help-circle"></i><span
                          class="hide-menu">Doctorants</span></a>
              </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="pages-error-404.html" aria-expanded="false"><i class="mdi me-2 mdi-help-circle"></i><span
                    class="hide-menu">Doctorant Dashboard</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="pages-error-404.html" aria-expanded="false"><i class="mdi me-2 mdi-help-circle"></i><span
                    class="hide-menu">Activités</span></a>
            </li>
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