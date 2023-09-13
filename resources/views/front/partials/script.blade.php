<!-- Vendor JS Files -->
<script src="{{ asset('front/vendor/aos/aos.js')}}"></script>
<script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('front/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('front/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>

<!-- Le javascript Bootstrap -->
<script src="{{ asset('js/app.js') }}"></script>

<script>
     $(document).ready(function() {
    $('#news-carousel').carousel({
      interval: 3000, // Temps d'affichage en millisecondes entre chaque diapositive (3 secondes dans cet exemple)
      pause: 'hover' // Optionnelle : Mettre en pause le carrousel lorsque la souris survole la zone
    });
  });
</script>