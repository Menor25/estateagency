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
                    <a class="nav-link " href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="properties">Property</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="blogs">Blog</a>
                </li> -->
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
        <!-- <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
            data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button> -->
    </div>
</nav><!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="home">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select class="custom-select">
                  <option selected>All</option>
                  <!-- <option value="1">New to Old</option> -->
                  <option value="2">For Rent</option>
                  <option value="3">For Sale</option>
                </select>
              </form>
            </div>
          </div>
          <?php
              $properties = Property::find_all_properties_limit();
              
              foreach ($properties as $property):
          ?>
          <?php
                  $properties_image = PropertyImages::find_all_by_id($property->id, 'property_id');
                  
                  foreach ($properties_image as $property_image):
            ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a" style="height: 400px;">
                <img src="agencyAdmin/<?= $property_image->property_image; ?>" alt="" class="img-a img-fluid" 
                style="width: 100%; height: 100%;">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <?php
                        $split_address = explode(" ", $property->property_address);
                    ?>
                    <h2 class="card-title-a">
                      <a href="#"><?= $split_address[0]; ?> <?= $split_address[1]; ?>
                        <br /> <?= $split_address[2]; ?>, <?= $property->city; ?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a"><?= $property->sales_type; ?> | <?= $property->property_price; ?></span>
                    </div>
                    <a href="property-view?id=<?= encodeString($property->id); ?>" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <?php if (!empty($property->square_ft)){ ?>
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?= $property->square_ft; ?>m
                          <sup>2</sup>
                        </span>
                      </li>
                      <?php } ?>
                      <?php if (!empty($property->bedrooms)){ ?>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span><?= $property->bedrooms; ?></span>
                      </li>
                      <?php } ?>
                      <?php if (!empty($property->kitchen)){ ?>
                      <li>
                        <h4 class="card-info-title">Kitchen</h4>
                        <span><?= $property->kitchen; ?></span>
                      </li>
                      <?php } ?>
                      <?php if (!empty($property->car_parking)){ ?>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span><?= $property->car_parking; ?></span>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
          <?php endforeach;?>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <span class="ion-ios-arrow-back"></span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="#">
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->

  <?php include "includes/footer.php"; ?>