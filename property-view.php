<?php include "includes/header.php"; ?>

<?php
     $property_id = $_GET['id'];
     $property_id = decodeString($property_id);
     $property_details = Property::find_by_id($property_id);
     $agent_property = Agent::find_by_id($property_details->agent_id);
     $full_name = $agent_property->first_name . " " . $agent_property->last_name . " " . $agent_property->other_name;
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
                    <a class="nav-link" href="home">Home</a>
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

    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single"><?=$property_details->property_address; ?></h1>
                            <span class="color-text-a"><?=$property_details->city; ?>, <?=$property_details->state; ?></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="home">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="properties">Properties</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                  <?=$property_details->property_address; ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- ======= Property Single ======= -->
        <section class="property-single nav-arrow-b">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                            <?php 
                                $property_images = PropertyImages::find_all_by_id($property_id, 'property_id');
                                foreach ($property_images as $property_image):
                            ?>
                            <div class="carousel-item-b" style="height: 700px;">
                                <img src="agencyAdmin/<?= $property_image->property_image; ?>" alt="Property Image" 
                                style="width: 100%; height: 100%;">
                            </div>
                                <?php endforeach; ?>
                            <!-- <div class="carousel-item-b">
                                <img src="assets/img/slide-3.jpg" alt="">
                            </div>
                            <div class="carousel-item-b">
                                <img src="assets/img/slide-1.jpg" alt="">
                            </div> -->
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-md-5 col-lg-4">
                                <div class="property-price d-flex justify-content-center foo">
                                    <div class="card-header-c d-flex">
                                        <div class="card-box-ico">
                                            <!-- <span class="ion-money">$</span> -->
                                        </div>
                                        <div class="card-title-c align-self-center">
                                            <h5 class="title-c"><?=$property_details->property_price; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-summary">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="title-box-d section-t4">
                                                <h3 class="title-d">Quick Summary</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-list">
                                        <ul class="list">
                                            <li class="d-flex justify-content-between">
                                                <strong>Property ID:</strong>
                                                <span><?=$property_details->id; ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Location:</strong>
                                                <span><?=$property_details->property_address; ?>, 
                                                <?=$property_details->city; ?>, <?=$property_details->state; ?></span>
                                            </li>
                                            <?php if(!empty($property_details->property_type)) { ?>
                                            <li class="d-flex justify-content-between">
                                                <strong>Property Type:</strong>
                                                <span><?=$property_details->property_type; ?></span>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_details->sales_type)) { ?>
                                            <li class="d-flex justify-content-between">
                                                <strong>Status:</strong>
                                                <span><?=$property_details->sales_type; ?></span>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_details->square_ft)) { ?>
                                            <li class="d-flex justify-content-between">
                                                <strong>Area:</strong>
                                                <span><?=$property_details->square_ft; ?>m
                                                    <sup>2</sup>
                                                </span>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_details->bedrooms)) { ?>
                                            <li class="d-flex justify-content-between">
                                                <strong>Beds:</strong>
                                                <span><?=$property_details->bedrooms; ?></span>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_details->kitchen)) { ?>
                                            <li class="d-flex justify-content-between">
                                                <strong>Kitchen:</strong>
                                                <span><?=$property_details->kitchen; ?></span>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_details->car_parking)) { ?>
                                            <li class="d-flex justify-content-between">
                                                <strong>Garage:</strong>
                                                <span><?=$property_details->car_parking; ?></span>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 section-md-t3">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d">
                                            <h3 class="title-d">Property Description</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-description">
                                    <p class="description color-text-a">
                                    <?=$property_details->property_desc; ?>
                                    </p>
                                    <!-- <p class="description color-text-a no-margin">
                                        
                                    </p> -->
                                </div>
                                <div class="row section-t3">
                                    <div class="col-sm-12">
                                        <div class="title-box-d">
                                            <h3 class="title-d">Basic Amenities</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="amenities-list color-text-a">
                                    <ul class="list-a no-margin">
                                      <?php if(!empty($property_details->balcony)) { ?>
                                        <li>Balcony</li>
                                      <?php } ?>
                                      <?php if(!empty($property_details->air_conditioning)) { ?>
                                        <li>Air Conditioning</li>
                                        <?php } ?>
                                        <?php if(!empty($property_details->cable_tv)) { ?>
                                        <li>Cable Tv</li>
                                        <?php } ?>
                                        <?php if(!empty($property_details->computer)) { ?>
                                        <li>Computer</li>
                                        <?php } ?>
                                        <?php if(!empty($property_details->dishwasher)) { ?>
                                        <li>Dishwasher</li>
                                        <?php } ?>
                                        <?php if(!empty($property_details->internet)) { ?>
                                        <li>Internet</li>
                                        <?php } ?>
                                        <?php if(!empty($property_details->swimming_pool)) { ?>
                                        <li>Swimming Pool</li>
                                        <?php } ?>
                                        <?php if(!empty($property_details->terrace)) { ?>
                                        <li>Terrace</li>
                                        <?php } ?>
                                        <?php if(!empty($property_details->near_hospital)) { ?>
                                        <li>Near Hospital</li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video"
                                    role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-plans-tab" data-toggle="pill" href="#pills-plans"
                                    role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab"
                                    aria-controls="pills-map" aria-selected="false">Ubication</a>
                            </li> -->
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- <div class="tab-pane fade show active" id="pills-video" role="tabpanel"
                                aria-labelledby="pills-video-tab">
                                <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460"
                                    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div> -->
                            <div class="tab-pane fade show active" id="pills-plans" role="tabpanel"
                                aria-labelledby="pills-plans-tab" style="width: 800px; height: 500px;">
                                <img src="agencyAdmin/<?= $property_details->property_plan; ?>" alt="Property Plan" class="img-fluid" 
                                style="width: 100%; height: 100%;">
                            </div>
                            <!-- <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834"
                                    width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row section-t3">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <h3 class="title-d">Contact Agent</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <?php
                              $agent_property = Agent::find_by_id($property_details->agent_id);
                              $full_name = $agent_property->first_name . " " . $agent_property->last_name . " " . $agent_property->other_name;
                          ?>
                            <div class="col-md-6 col-lg-4" style="height: 400px;">
                                <img src="agencyAdmin/<?= $agent_property->agent_photo; ?>" alt="Agent Photo" class="img-fluid" 
                                style="width: 100%; height: 100%;">
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="property-agent">
                                    <h4 class="title-agent"><?= $full_name; ?></h4>
                                    <p class="color-text-a">
                                        <?=  $agent_property->biography; ?>
                                    </p>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between">
                                            <strong>Phone:</strong>
                                            <span class="color-text-a"><?=  $agent_property->phone; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Mobile:</strong>
                                            <span class="color-text-a"><?=  $agent_property->phone; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Email:</strong>
                                            <span class="color-text-a"><?=  $agent_property->email; ?></span>
                                        </li>
                                        <!-- <li class="d-flex justify-content-between">
                                            <strong>Skype:</strong>
                                            <span class="color-text-a">Annabela.ge</span>
                                        </li> -->
                                    </ul>
                                    <div class="socials-a">
                                        <ul class="list-inline">
                                          <?php if(!empty($agent_property->facebook)) { ?>
                                            <li class="list-inline-item">
                                                <a href="<?= $agent_property->facebook; ?>" target="_blank">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($agent_property->twitter)) { ?>
                                            <li class="list-inline-item">
                                                <a href="<?= $agent_property->twitter; ?>" target="_blank">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($agent_property->instagram)) { ?>
                                            <li class="list-inline-item">
                                                <a href="<?= $agent_property->instagram; ?>" target="_blank">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($agent_property->linkedin)) { ?>
                                            <li class="list-inline-item">
                                                <a href="<?= $agent_property->linkedin; ?>" target="_blank">
                                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <?php } ?>
                                            <!-- <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                                                </a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="property-contact">
                                    <form class="form-a">
                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-a"
                                                        id="inputName" placeholder="Name *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-a"
                                                        id="inputEmail1" placeholder="Email *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <textarea id="textMessage" class="form-control"
                                                        placeholder="Comment *" name="message" cols="45" rows="8"
                                                        required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-a">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Property Single-->

    </main><!-- End #main -->

    <?php include "includes/footer.php"; ?>