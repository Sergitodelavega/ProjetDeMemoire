 <!-- ======= Footer ======= -->
 <footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-info">
          <h3>À PROPOS DE NOUS</h3>
          <p>La Plateforme Numérique Doctorale est une plateforme web de gestion et de suivi des projets de thèse des écoles doctorales de l'UAC.</p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>MENUS</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Évènements</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Partenaires</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">FAQ</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Connexion</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>VIE PRIVÉE</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Termes et Conditions</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Politique de Confidentialité</a></li>
          </ul><br>
          <h4>CONTACT</h4>
          <p>
            <strong>Phone:</strong> +229 98 52 61 32<br>
            <strong>Email:</strong> info@example.com<br>
          </p>
        </div>


        <div class="col-lg-3 col-md-6">
          <div>
            <h4>Newsletter</h4>
            <p>Abonnez-vous à la newsletter.</p>
          </div><br>
          <div class="footer-newsletter">
            <form action="{{ route('newsletter') }}" method="post">
              <input type="email" name="email"><input type="submit" value="S'abonner">
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

</footer><!-- End Footer -->
