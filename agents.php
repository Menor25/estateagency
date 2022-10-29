<?php include "includes/header.php"; ?>

<?php
    $agents = Agent::find_all_properties_limit();
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
        <!-- =======Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Our Amazing Agents</h1>
                            <span class="color-text-a">Grid Agents</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="home">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Agents
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- ======= Agents Grid ======= -->
        <section class="agents-grid grid">
            <div class="container">
                <div class="row">
                  <?php
                      foreach ($agents as $agent):
                  ?>
                    <div class="col-md-4">
                        <div class="card-box-d">
                            <div class="card-img-d" style="height: 400px;">
                                <img src="agencyAdmin/<?= $agent->agent_photo; ?>" alt="Agent Photo" class="img-d img-fluid" 
                                style="height: 100%; width: 100%;">
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
        </section><!-- End Agents Grid-->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "includes/footer.php"; ?>