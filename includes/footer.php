<?php
  $settings = Setting::find_by_id(2);
 

?>
  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Elema-Igie Ventures</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                <?= $settings->company_address; ?><br> 
                <?= $settings->city; ?>, <?= $settings->state; ?> State <br>
                <?= $settings->country; ?>.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
              <?php if (!empty($settings->company_email)){ ?>
                <li class="color-a">
                  <span class="color-text-a">Email: </span> <?= $settings->company_email; ?>
                </li> 
                <?php } ?>
                <?php if (!empty($settings->company_phone)){ ?>
                <li class="color-a">
                  <span class="color-text-a">Phone: </span> <?= $settings->company_phone; ?>
                </li>
                <?php } ?>
                <?php if (!empty($settings->company_mobile)){ ?>
                  <li class="color-a">
                  <span class="color-text-a">Mobile: </span> <?= $settings->company_mobile; ?>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">The Company</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Terms of Service</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">International Office</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                <?= $settings->international_office; ?><br> 

              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
 
               
                <?php if (!empty($settings->company_phone)){ ?>
                <li class="color-a">
                  <span class="color-text-a">Phone: </span> <?= $settings->company_phone; ?>
                </li>
                <?php } ?>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="home">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="about">About</a>
              </li>
              <li class="list-inline-item">
                <a href="properties">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="blogs">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="contact">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
            <?php if (!empty($settings->facebook)){ ?>
              <li class="list-inline-item">
                <a href="<?= $settings->facebook; ?>" target="_blank">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <?php } ?>
              <?php if (!empty($settings->twitter)){ ?>
              <li class="list-inline-item">
                <a href="<?= $settings->twitter; ?>" target="_blank">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <?php } ?>
              <?php if (!empty($settings->instagram)){ ?>
              <li class="list-inline-item">
                <a href="<?= $settings->instagram; ?>" target="_blank">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <?php } ?>
              <?php if (!empty($settings->linkedin)){ ?>
              <li class="list-inline-item">
                <a href="<?= $settings->linkedin; ?>" target="_blank">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright <?php echo date("Y") ?>
              <span class="color-a">Elema-Igie Ventures</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
           
            Designed by <a href="https://www.linkedin.com/in/theophilus-menor-a06b56b2">Theophilus Menor</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>