@extends('back.appback')
@section('title', 'Activities')

@section('content')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Activités</h3>
            <div class="d-flex align-items-center">
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav> --}}
            </div>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <div class="text-end upgrade-btn">
                <a href="https://www.wrappixel.com/templates/materialpro/"
                    class="btn btn-danger d-none d-md-inline-block text-white" target="_blank">Upgrade to
                    Pro</a>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
 <!-- ============================================================== -->
          <!-- Container fluid  -->
          <!-- ============================================================== -->
          <div class="container-fluid">
              <!-- ============================================================== -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
              <div class="row">
                  <!-- column -->
                  <div class="col-sm-12">
                      <div class="card">
                          <div class="card-body">
                              {{-- <h4 class="card-title">Basic Table</h4>
                              <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                              <div class="table-responsive">
                                  <table class="table user-table">
                                      <thead>
                                          <tr scope="row">
                                              <th class="border-top-0">#</th>
                                              <th class="border-top-0">Titre</th>
                                              <th class="border-top-0">Semestre</th>
                                              <th class="border-top-0 col-span-2 text-center">Opérations</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>1</td>
                                              <td>Deshmukh</td>
                                              <td>Prohaska</td>
                                              <td>
                                                <a href="#" class="btn btn-info d-none d-md-inline-block text-white">Soumettre
                                                </a>
                                              </td>
                                              <td>
                                                <a href="#" class="btn btn-danger d-none d-md-inline-block text-white">Voir plus
                                                </a>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>2</td>
                                              <td>Deshmukh</td>
                                              <td>Gaylord</td>
                                              <td>
                                                <a href="#" class="btn btn-info d-none d-md-inline-block text-white">Soumettre
                                                </a>
                                              </td>
                                              <td>
                                                <a href="#" class="btn btn-danger d-none d-md-inline-block text-white">Voir plus
                                                </a>
                                              </td>

                                          </tr>
                                          <tr>
                                              <td>3</td>
                                              <td>Sanghani</td>
                                              <td>Gusikowski</td>
                                              <td>
                                                <a href="#" class="btn btn-info d-none d-md-inline-block text-white">Soumettre
                                                </a>
                                              </td>
                                              <td>
                                                <a href="#" class="btn btn-danger d-none d-md-inline-block text-white">Voir plus
                                                </a>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- ============================================================== -->
              <!-- End PAge Content -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Right sidebar -->
              <!-- ============================================================== -->
              <!-- .right-sidebar -->
              <!-- ============================================================== -->
              <!-- End Right sidebar -->
              <!-- ============================================================== -->
          </div>
@endsection