<?php include "includes/header.php"; ?>

<?php
     $agent_id = $_GET['id'];
     $agent_id = decodeString($agent_id);
     $agent_details = Agent::find_by_id($agent_id);
  print_r($agent_details);
    //  $agent_property = Agent::find_by_id($property_details->agent_id);
    //  $full_name = $agent_property->first_name . " " . $agent_property->last_name . " " . $agent_property->other_name;
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
                            <h1 class="title-single"><?= $agent_details->first_name ?> <?= $agent_details->last_name ?> <?= $agent_details->other_name ?></h1>
                            <span class="color-text-a">Agent, <?= $agent_details->city ?></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="home">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="agents">Agents</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                <?= $agent_details->first_name ?> <?= $agent_details->last_name ?> <?= $agent_details->other_name ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single -->

        <!-- ======= Agent Single ======= -->
        <section class="agent-single">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="agent-avatar-box" style="height: 500px;">
                                    <img src="agencyAdmin/<?= $agent_details->agent_photo; ?>" alt="" class="agent-avatar img-fluid" 
                                    style="width: 100%; height: 100%;">
                                </div>
                            </div>
                            <div class="col-md-5 section-md-t3">
                                <div class="agent-info-box">
                                    <div class="agent-title">
                                        <div class="title-box-d">
                                            <h3 class="title-d"><?= $agent_details->first_name; ?> <?= $agent_details->last_name; ?>
                                                <br> <?= $agent_details->other_name; ?></h3>
                                        </div>
                                    </div>
                                    <div class="agent-content mb-3">
                                        <p class="content-d color-text-a">
                                        <?= $agent_details->biography; ?>
                                        </p>
                                        <div class="info-agents color-a">
                                            <p>
                                                <strong>Phone: </strong>
                                                <span class="color-text-a"> <?= $agent_details->phone; ?> </span>
                                            </p>
                                            <p>
                                                <strong>Mobile: </strong>
                                                <span class="color-text-a"> <?= $agent_details->phone; ?></span>
                                            </p>
                                            <p>
                                                <strong>Email: </strong>
                                                <span class="color-text-a"> <?= $agent_details->email; ?></span>
                                            </p>
                                            <!-- <p>
                                                <strong>skype: </strong>
                                                <span class="color-text-a"> Margaret.Es</span>
                                            </p> -->
                                        </div>
                                    </div>
                                    <div class="socials-footer">
                                        <ul class="list-inline">
                                        <?php if (!empty($agent_details->facebook)) { ?>
                                        <li class="list-inline-item">
                                            <a href="<?= $agent_details->facebook; ?>" title="Linkedin" class="link-one" target="_blank">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if (!empty($agent_details->twitter)) { ?>
                                        <li class="list-inline-item">
                                            <a href="<?= $agent_details->twitter; ?>" title="Linkedin" class="link-one" target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if (!empty($agent_details->instagram)) { ?>
                                        <li class="list-inline-item">
                                            <a href="<?= $agent_details->instagram; ?>" title="Linkedin" class="link-one" target="_blank">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if (!empty($agent_details->linkedin)) { ?>
                                        <li class="list-inline-item">
                                            <a href="<?= $agent_details->linkedin; ?>" title="Linkedin" class="link-one" target="_blank">
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
                    <?php
                            $agent_properties = Property::find_all_by_id($agent_details->id, "agent_id");
                           // print_r($agent_properties);

                            
                            if (empty($agent_properties)) {
                              echo " ";
                            }else {
                        ?>
                        
                    <div class="col-md-12 section-t8">
                        <div class="title-box-d">
                          <?php
                              $number_of_property = row_count("agent_id", $agent_details->id, "tbl_properties");
                          ?>
                            <h3 class="title-d">My Properties (<?= $number_of_property; ?>)</h3>
                        </div>
                    </div>
                    <div class="row property-grid grid">
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
                        <?php foreach ($agent_properties as $agent_property) : ?>
                        <?php
                               $properties_image = PropertyImages::find_all_by_id($agent_property->id, 'property_id');
                  
                               foreach ($properties_image as $property_image):
                        ?>
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a" style="height: 400px;">
                                    <img src="agencyAdmin/<?= $property_image->property_image; ?>" alt="Property Image" class="img-a img-fluid" 
                                    style="width: 100%; height: 100%;">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                <a href="property-view?id=<?= encodeString($agent_property->id); ?>"><?= $agent_property->property_address; ?>
                                                    <br /> <?= $agent_property->city ?>, <?= $agent_property->state; ?></a>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a"><?= $agent_property->sales_type; ?> | <?= $agent_property->property_price; ?></span>
                                            </div>
                                            <a href="#" class="link-a">Click here to view
                                                <span class="ion-ios-arrow-forward"></span>
                                            </a>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                              <?php if (!empty($agent_property->square_ft)){ ?>
                                              <li>
                                                <h4 class="card-info-title">Area</h4>
                                                <span><?= $agent_property->square_ft; ?>m
                                                  <sup>2</sup>
                                                </span>
                                              </li>
                                              <?php } ?>
                                              <?php if (!empty($agent_property->bedrooms)){ ?>
                                              <li>
                                                <h4 class="card-info-title">Beds</h4>
                                                <span><?= $agent_property->bedrooms; ?></span>
                                              </li>
                                              <?php } ?>
                                              <?php if (!empty($agent_property->kitchen)){ ?>
                                              <li>
                                                <h4 class="card-info-title">Kitchen</h4>
                                                <span><?= $agent_property->kitchen; ?></span>
                                              </li>
                                              <?php } ?>
                                              <?php if (!empty($agent_property->car_parking)){ ?>
                                              <li>
                                                <h4 class="card-info-title">Garages</h4>
                                                <span><?= $agent_property->car_parking; ?></span>
                                              </li>
                                              <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php endforeach; ?>
                          <?php endforeach; ?>

                    </div>
                    <?php } ?>
                </div>
            </div>
        </section><!-- End Agent Single -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "includes/footer.php"; ?>