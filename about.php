<?php include "includes/header.php"; ?>

<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="home">
            <img src="assets/img/Elema-igie.PNG" alt="" width="80" height="60">
            Elema-Igie <span class="color-b">Ventures</span>
        </a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none"
            data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="properties">Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogs">Blog</a>
                </li>
                <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pages
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="property-single.html">Property Single</a>
              <a class="dropdown-item" href="blog-single.html">Blog Single</a>
              <a class="dropdown-item" href="agents-grid.html">Agents Grid</a>
              <a class="dropdown-item" href="agent-single.html">Agent Single</a>
            </div>
          </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                </li>
            </ul>
        </div>
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
            data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
    </div>
</nav><!-- End Header/Navbar -->
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">We Have Great Properties For Creative Mind</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="home">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  About
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= About Section ======= -->
    <section class="section-about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="about-img-box">
              <img src="assets/img/slide-about-1.jpg" alt="" class="img-fluid">
            </div>
            <div class="sinse-box">
              <h3 class="sinse-title">EstateAgency
                <span></span>
                <br> Sinse 2017</h3>
              <p>Elema-Igie Ventures</p>
            </div>
          </div>
          <div class="col-md-12 section-t8">
            <div class="row">
              <div class="col-md-6 col-lg-5">
                <img src="assets/img/about-2.jpg" alt="" class="img-fluid">
              </div>
              <div class="col-lg-2  d-none d-lg-block">
                <div class="title-vertical d-flex justify-content-start">
                  <span>Elema-Igie Ventures</span>
                </div>
              </div>
              <div class="col-md-6 col-lg-5 section-md-t3">
                <div class="title-box-d">
                  <h3 class="title-d">Exclusive
                    <span class="color-d">Properties</span> </h3>
                </div>
                <p class="color-text-a">
                  Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget
                  consectetur sed, convallis
                  at tellus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum
                  ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit
                  neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                </p>
                <p class="color-text-a">
                  Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                  Mauris blandit aliquet
                  elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed,
                  convallis at tellus.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =======Team Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Meet Our Team</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        <?php
            $agents = Agent::find_all_rand();

            foreach ($agents as $agent) :
        ?>
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d" style="height: 400px;">
                <img src="agencyAdmin/<?= $agent->agent_photo; ?>" alt="" class="img-d img-fluid" 
                style="width: 100%; height: 100%;">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.html" class="link-two"><?= $agent->first_name; ?> <?= $agent->last_name; ?>
                        <br> <?= $agent->other_name; ?></a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                  <?= $agent->biography; ?>
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> <?= $agent->phone; ?></p>
                    <p>
                      <strong>Email: </strong> <?= $agent->email; ?></p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                    <?php if (!empty($agent->facebook)) { ?>
                                        <li class="list-inline-item">
                                            <a href="<?= $agent->facebook; ?>" class="link-one" target="_blank">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if (!empty($agent->twitter)) { ?>
                                        <li class="list-inline-item">
                                            <a href="<?= $agent->twitter; ?>" class="link-one" target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if (!empty($agent->instagram)) { ?>
                                        <li class="list-inline-item">
                                            <a href="<?= $agent->instagram; ?>" class="link-one" target="_blank">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if (!empty($agent->linkedin)) { ?>
                                        <li class="list-inline-item">
                                            <a href="<?= $agent->linkedin; ?>" class="link-one" target="_blank">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </section><!-- End About Section-->

  </main><!-- End #main -->

  <?php include "includes/footer.php"; ?>