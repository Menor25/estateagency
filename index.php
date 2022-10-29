<?php include "includes/header.php"; ?>

<?php
  $property_images = PropertyImages::find_all_rand_slide();
  //print_r($property_images);

?>
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
                    <a class="nav-link active" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="properties">Property</a>
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

<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <?php foreach ($property_images as $property_image): ?>
        <?php
            $properties = Property::find_all_by_id($property_image->property_id, 'id');
            foreach ($properties as $property):
        ?>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(agencyAdmin/<?= $property_image->property_image; ?>)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top"><?= $property->property_name; ?>
                                        </p>
                                    <h4 class="intro-title mb-4">
                                    <?php
                                      $break_address = explode(" ", $property->property_address);
                                      ?>
                                        <span class="color-b"><?=$break_address[0]; ?> </span> <?=$break_address[1]; ?> <?=$break_address[2]; ?>
                                        <br> <?= $property->state; ?></h4>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a"><?= $property->sales_type; ?> | <?= $property->property_price; ?></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
       
    </div>
</div><!-- End Intro Section -->

<main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Our Services</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-home"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Build</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien
                                massa,
                                convallis a pellentesque
                                nec, egestas non nisi.
                            </p>
                        </div>
                        <!-- <div class="card-footer-c">
                            <a href="#" class="link-c link-icon">Read more
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Rent</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit.
                                Mauris blandit
                                aliquet elit, eget tincidunt
                                nibh pulvinar a.
                            </p>
                        </div>
                        <!-- <div class="card-footer-c">
                            <a href="#" class="link-c link-icon">Read more
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-home"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Sell</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien
                                massa,
                                convallis a pellentesque
                                nec, egestas non nisi.
                            </p>
                        </div>
                        <!-- <div class="card-footer-c">
                            <a href="#" class="link-c link-icon">Read more
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Latest Properties</h2>
                        </div>
                        <div class="title-link">
                            <a href="properties">All Property
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">
              <?php
                foreach ($property_images as $property_image) :
              ?>
              <?php
                  $properties = Property::find_all_by_id($property_image->property_id, 'id');
                  foreach ($properties as $property):
              ?>
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <div class="img-box-a" style="height: 400px;">
                            <img src="agencyAdmin/<?= $property_image->property_image; ?>" alt="" class="img-a img-fluid" 
                            style="height: 100%; width: 100%;">
                        </div>
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                  <?php
                                      $break_add = explode(" ", $property->property_address);
                                  ?>
                                    <h2 class="card-title-a">
                                        <a href="property-single.html"><?= $break_add[0] ?> <?= $break_add[1] ?>
                                            <br /> <?= $break_add[2] ?>, <?= $property->state; ?></a>
                                    </h2>
                                </div>
                                <div class="card-body-a">
                                    <div class="price-box d-flex">
                                        <span class="price-a"><?= $property->sales_type ?> | <?= $property->property_price ?></span>
                                    </div>
                                    <a href="property-view?id=<?= encodeString($property->id); ?>" class="link-a">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                </div>
                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <h4 class="card-info-title">Area</h4>
                                            <span> <?= $property->square_ft ?>m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Beds</h4>
                                            <span> <?= $property->bedrooms ?></span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Kitchen</h4>
                                            <span> <?= $property->kitchen ?></span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Garages</h4>
                                            <span> <?= $property->car_parking ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endforeach; ?>

        </div>
    </section><!-- End Latest Properties Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Best Agents</h2>
                        </div>
                        <div class="title-link">
                            <a href="agents">All Agents
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
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
                                        <a href="agent-single?id=<?= encodeString($agent->id) ?>" class="link-two"><?= $agent->first_name; ?> <?= $agent->last_name; ?>
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
                <!-- <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="assets/img/agent-1.jpg" alt="" class="img-d img-fluid">
                        </div>
                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h3 class="title-d">
                                        <a href="agent-single.html" class="link-two">Stiven Spilver
                                            <br> Darw</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body-d">
                                <p class="content-d color-text-a">
                                    Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                                </p>
                                <div class="info-agents color-a">
                                    <p>
                                        <strong>Phone: </strong> +54 356 945234</p>
                                    <p>
                                        <strong>Email: </strong> agents@example.com</p>
                                </div>
                            </div>
                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="assets/img/agent-5.jpg" alt="" class="img-d img-fluid">
                        </div>
                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h3 class="title-d">
                                        <a href="agent-single.html" class="link-two">Emma Toledo
                                            <br> Cascada</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body-d">
                                <p class="content-d color-text-a">
                                    Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                                </p>
                                <div class="info-agents color-a">
                                    <p>
                                        <strong>Phone: </strong> +54 356 945234</p>
                                    <p>
                                        <strong>Email: </strong> agents@example.com</p>
                                </div>
                            </div>
                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section><!-- End Agents Section -->

    <!-- ======= Latest News Section ======= -->
    <!-- <section class="section-news section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Latest News</h2>
                        </div>
                        <div class="title-link">
                            <a href="blog-grid.html">All News
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="new-carousel" class="owl-carousel owl-theme">
                <div class="carousel-item-c">
                    <div class="card-box-b card-shadow news-box">
                        <div class="img-box-b">
                            <img src="assets/img/post-2.jpg" alt="" class="img-b img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-header-b">
                                <div class="card-category-b">
                                    <a href="#" class="category-b">House</a>
                                </div>
                                <div class="card-title-b">
                                    <h2 class="title-2">
                                        <a href="blog-single.html">House is comming
                                            <br> new</a>
                                    </h2>
                                </div>
                                <div class="card-date">
                                    <span class="date-b">18 Sep. 2017</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item-c">
                    <div class="card-box-b card-shadow news-box">
                        <div class="img-box-b">
                            <img src="assets/img/post-5.jpg" alt="" class="img-b img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-header-b">
                                <div class="card-category-b">
                                    <a href="#" class="category-b">Travel</a>
                                </div>
                                <div class="card-title-b">
                                    <h2 class="title-2">
                                        <a href="blog-single.html">Travel is comming
                                            <br> new</a>
                                    </h2>
                                </div>
                                <div class="card-date">
                                    <span class="date-b">18 Sep. 2017</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item-c">
                    <div class="card-box-b card-shadow news-box">
                        <div class="img-box-b">
                            <img src="assets/img/post-7.jpg" alt="" class="img-b img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-header-b">
                                <div class="card-category-b">
                                    <a href="#" class="category-b">Park</a>
                                </div>
                                <div class="card-title-b">
                                    <h2 class="title-2">
                                        <a href="blog-single.html">Park is comming
                                            <br> new</a>
                                    </h2>
                                </div>
                                <div class="card-date">
                                    <span class="date-b">18 Sep. 2017</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item-c">
                    <div class="card-box-b card-shadow news-box">
                        <div class="img-box-b">
                            <img src="assets/img/post-3.jpg" alt="" class="img-b img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-header-b">
                                <div class="card-category-b">
                                    <a href="#" class="category-b">Travel</a>
                                </div>
                                <div class="card-title-b">
                                    <h2 class="title-2">
                                        <a href="#">Travel is comming
                                            <br> new</a>
                                    </h2>
                                </div>
                                <div class="card-date">
                                    <span class="date-b">18 Sep. 2017</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End Latest News Section -->

    <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 nav-arrow-a">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Testimonials</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="testimonial-carousel" class="owl-carousel owl-arrow">
                <div class="carousel-item-a">
                    <div class="testimonials-box">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-img">
                                    <img src="assets/img/testimonial-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-ico">
                                    <span class="ion-ios-quote"></span>
                                </div>
                                <div class="testimonials-content">
                                    <p class="testimonial-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea
                                        nam praesentium
                                        debitis hic ber quibusdam
                                        voluptatibus officia expedita corpori.
                                    </p>
                                </div>
                                <div class="testimonial-author-box">
                                    <img src="assets/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                                    <h5 class="testimonial-author">Albert & Erika</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item-a">
                    <div class="testimonials-box">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-img">
                                    <img src="assets/img/testimonial-2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-ico">
                                    <span class="ion-ios-quote"></span>
                                </div>
                                <div class="testimonials-content">
                                    <p class="testimonial-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea
                                        nam praesentium
                                        debitis hic ber quibusdam
                                        voluptatibus officia expedita corpori.
                                    </p>
                                </div>
                                <div class="testimonial-author-box">
                                    <img src="assets/img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                                    <h5 class="testimonial-author">Pablo & Emma</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->

<?php include "includes/footer.php"; ?>