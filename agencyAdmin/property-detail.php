<?php require_once "includes/header.php"; ?>

<?php
     $property_id = $_GET['id'];
     $property_id = decodeString($property_id);
     $property_details = Property::find_by_id($property_id);
     $agent_property = Agent::find_by_id($property_details->agent_id);
     $full_name = $agent_property->first_name . " " . $agent_property->last_name . " " . $agent_property->other_name;
?>

<body class="theme-purple">

    <?php require_once "includes/loader.php"; ?>

    <div class="overlay"></div>

    <?php require_once "includes/navigation.php"; ?>

    <?php require_once "includes/sidebar.php"; ?>

    <?php require_once "includes/right-sidebar.php"; ?>

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Property Detail
                        <small>Welcome to <?= $welcome; ?></small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                    
                    <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right ml-3" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Property</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div id="demo2" class="carousel slide" data-ride="carousel">
                                <ul class="carousel-indicators">
                                    <li data-target="#demo2" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo2" data-slide-to="1" class=""></li>
                                    <li data-target="#demo2" data-slide-to="2" class=""></li>
                                </ul>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/images/image-gallery/5.jpg" class="img-fluid" alt="">
                                        <div class="carousel-caption">
                                            <h3>Chicago</h3>
                                            <p>Thank you, Chicago!</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/image-gallery/6.jpg" class="img-fluid" alt="">
                                        <div class="carousel-caption">
                                            <h3>New York</h3>
                                            <p>We love the Big Apple!</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/image-gallery/12.jpg" class="img-fluid" alt="">
                                        <div class="carousel-caption">
                                            <h3>Los Angeles</h3>
                                            <p>We had such a great time in LA!</p>
                                        </div>
                                    </div>
                                </div>

                                <a class="carousel-control-prev" href="#demo2" data-slide="prev"><span
                                        class="carousel-control-prev-icon"></span></a>
                                <a class="carousel-control-next" href="#demo2" data-slide="next"><span
                                        class="carousel-control-next-icon"></span></a>
                            </div>
                            <h6 class="text-success mt-3"><?= $property_details->property_price ?></h6>
                            <h5 class="mt-0"><a href="#" class="col-blue-grey"><?= $property_details->property_name;?></a></h5>
                            <p class="text-muted"> <?= $property_details->property_desc; ?> </p>
                            <small class="text-muted"><i class="zmdi zmdi-pin mr-2"></i><?= $property_details->property_address; ?></small>
                            <div class="d-flex flex-wrap justify-content-start mt-3 p-3 bg-light">
                                <a href="#" class="w100" title="Square Feet"><i
                                        class="zmdi zmdi-view-dashboard mr-2"></i><span><?= $property_details->square_ft; ?></span></a>
                                <a href="#" class="w100" title="Bedroom"><i
                                        class="zmdi zmdi-hotel mr-2"></i><span><?= $property_details->bedrooms; ?></span></a>
                                <a href="#" class="w100" title="Parking space"><i
                                        class="zmdi zmdi-car-taxi mr-2"></i><span><?= $property_details->car_parking; ?></span></a>
                                <a href="#" class="w100" title="Year Built"><i class="zmdi zmdi-home mr-2"></i><span>
                                <?= $property_details->year_built; ?></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>General</strong> Amenities</h2>
                           
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <ul class="list-group">
                                    <?php
                                                if ($property_details->swimming_pool == 'Swimming Pool') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                        
                                            
                                                    <?php echo "Swimming pool";?>
                                               
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                        <?php
                                                if ($property_details->air_conditioning == 'Air Conditioning') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Air
                                            <?php echo" Air conditioning"; ?>
                                        </li>
                                    <?php  }
                                            
                                        ?>
                                    <?php
                                                if ($property_details->internet == 'Internet') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Internet"; ?>
                                        </li>
                                        <?php  }
                                            
                                        ?>
                                    <?php
                                                if ($property_details->balcony == 'Balcony') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Balcony"; ?>
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                    <?php
                                                if ($property_details->cable_tv == 'Cable TV') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Cable TV"; ?>
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="list-group">
                                    <?php
                                                if ($property_details->terrace == 'Terrace') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Terrace"; ?>
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                        <?php
                                                if ($property_details->cofee_pot == 'Cofee Pot') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Cofee Pot"; ?>
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                    <?php
                                                if ($property_details->near_estate == 'Near Estate') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Near Estate"; ?>
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                         <?php
                                                if ($property_details->dishwasher == 'Dishwasher') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Dishwasher"; ?>
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                    <?php
                                                if ($property_details->computer == 'Computer') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Dishwasher"; ?>
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="list-group">
                                    <?php
                                                if ($property_details->near_green_zone == 'Near Green Zone') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Near Green Zone";?>
                                        </li>
                                        <?php  }
                                            
                                            ?>
                                            <?php
                                                if ($property_details->near_church == 'Near Church') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                                <?php echo "Near Church";?>
                                            </li>
                                            <?php  }
                                            
                                            ?>
                                            <?php
                                                if ($property_details->near_hospital == 'Near Hospital') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Near Hospital"; ?>
                                        </li>
                                            <?php  }
                                            
                                            ?>
                                            <?php
                                                if ($property_details->near_school == 'Near School') {
                                    ?>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>
                                            <?php echo "Near School"; ?>
                                        </li>
                                            <?php  }
                                            
                                            ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card">
                        <div class="header">
                            <h2><strong>Location</strong> <small>Description text here...</small> </h2>
                        </div>
                        <div class="body">
                            <script data-cfasync="false"
                                src="../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
                            </script>
                            <script type="text/javascript" charset="utf-8" async
                                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=svdezAlqZP2WIeKGiLW4EUnoJvnxVP7i&amp;width=100%&amp;height=400&amp;lang=tr_TR&amp;sourceType=constructor&amp;scroll=true">
                            </script>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="body text-center" >
                            
                                <img src="<?= $agent_property->agent_photo; ?>" 
                                class="rounded-circle" alt="profile-image" style="" width="300px" height="300px">
                            <h4 class="m-t-10"><?= $full_name; ?></h4>
                            <div class="col-12">
                                <ul class="d-flex justify-content-center list-unstyled">
                                    <li class="w30"><a title="facebook" href="<?= $agent_property->facebook; ?>"><i class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li class="w30"><a title="twitter" href="<?= $agent_property->twitter; ?>"><i class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li class="w30"><a title="linkedin" href="<?= $agent_property->linkedin; ?>"><i
                                                class="zmdi zmdi-linkedin"></i></a></li>
                                </ul>
                                <p class="text-muted"><?= $agent_property->address; ?>, <?= $agent_property->city; ?></p>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Agent</strong> Contact</h2>
                            
                        </div>
                        <div class="body">
                            <div class="form-group">
                            <p class="text-muted"><strong>Mobile:</strong> <?= $agent_property->phone; ?></p>
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control" placeholder="Mobile No.">
                            </div> -->
                            <div class="form-group">
                            <p class="text-muted"><strong>Email:</strong> <?= $agent_property->email; ?></p>
                            </div>
                            <!-- <div class="form-group">
                                <textarea rows="4" class="form-control no-resize"
                                    placeholder="Please type what you want..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-round">Submit</button>
                            <button type="submit" class="btn btn-default btn-round btn-simple">Cancel</button> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Property Details</strong></h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered m-b-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Price:</th>
                                            <td><?= $property_details->property_price; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Contract type: </th>
                                            <td><span class="badge badge-primary"><?= $property_details->sales_type; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bedrooms:</th>
                                            <td><?= $property_details->bedrooms; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Square ft:</th>
                                            <td><?= $property_details->square_ft; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Garage Spaces:</th>
                                            <td><?= $property_details->car_parking; ?></td>
                                        </tr>

                                        <!-- <tr>
                                            <th scope="row">Listed for:</th>
                                            <td>15 days</td>
                                        </tr> -->
                                        <!-- <tr>
                                            <th scope="row">Available:</th>
                                            <td>Immediately</td>
                                        </tr> -->
                                        <!-- <tr>
                                            <th scope="row">Pets:</th>
                                            <td>Pets Allowed</td>
                                        </tr> -->
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "includes/footer.php"; ?>