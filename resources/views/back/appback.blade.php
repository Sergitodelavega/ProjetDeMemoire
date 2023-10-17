<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Material Pro Lite Template by WrapPixel</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css" rel="stylesheet">
    @include('back.partials.style')

    <!-- Le css Bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
      .hide {
          display: none;
      }
  </style>
</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
    @include('back.partials.header')

      <!-- Left Sidebar - style you can find in sidebar.scss  -->
    @include('back.partials.sidebar')
 
      <!-- Page wrapper  -->
    <div class="page-wrapper">
      @if(session()->has('success'))
        <div style="margin: 0 100px 0 700px" class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
        </div>
      @endif

      @if(session()->has('fail'))
        <div style="margin: 0 200px 0 200px" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('fail') }}
        </div>
      @endif

      @if(session()->has('success'))
        <script>
            // Fonction pour masquer l'alerte après un délai spécifié
            function hideAlert() {
                var alert = document.getElementById('alert');
                alert.classList.add('hide');
            }

            // Masquer l'alerte après 5 secondes (5000 millisecondes)
            setTimeout(hideAlert, 5000);
        </script>
    @endif
  
      @yield('content')
    </div>  
  </div>
   
    @include('back.partials.script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>
    <!-- Le javascript Bootstrap -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
  </body>
</html>
