<?php 
    require_once "includes/header.php";

    //Getting the property id
    $property_id = $_GET['id'];
    $property_id = decodeString($property_id);
    $property_details = Property::find_by_id($property_id);
    $agent_property = Agent::find_by_id($property_details->agent_id);
    $full_name = $agent_property->first_name . " " . $agent_property->last_name . " " . $agent_property->other_name;


?>
<?php
    if (Is_Post_request()) {
        Redirect_to("add-property");
    }
?>
<!-- Left Sidebar -->
<?php require_once "includes/sidebar.php"; ?>

<!-- Right Sidebar -->
<?php require_once "includes/right-sidebar.php"; ?>

<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Property Detail
                <small class="text-muted">Welcome to <?= $welcome; ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">  
                <form action="" method="post">             
                    <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" title="Delete property" type="submit">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                </form> 
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="property-list">Property</a></li>
                    <li class="breadcrumb-item active">Property Detail</li>
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
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo2" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                        <a class="carousel-control-next" href="#demo2" data-slide="next"><span class="carousel-control-next-icon"></span></a>
                    </div>
                    </div>
                </div>
                <div class="card property_list">
                    <div class="body">
                        <div class="property-content">
                            <div class="detail">
                                <h5 class="text-success m-t-0 m-b-0"><?= $property_details->property_price ?></h5>
                                <h4 class="m-t-0"><a href="#" class="col-blue-grey"><?= $property_details->property_name ?></a></h4>
                                <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i><?= $property_details->property_address ?>, <?= $property_details->city ?></p>
                                <p class="text-muted m-b-0"><?= $property_details->property_desc ?></p>
                            </div>
                            <div class="property-action m-t-15">
                                <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span><?= $property_details->square_ft ?></span></a>
                                <a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span><?= $property_details->bedrooms ?></span></a>
                                <a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span><?= $property_details->car_parking ?></span></a>
                                <a href="#" title="Year Built"><i class="zmdi zmdi-globe-alt"></i><span> <?= $property_details->year_built ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>General</strong> Amenities<small >Description Text Here...</small></h2>
                        
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <ul class="list-unstyled proprerty-features">
                                <li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Swimming pool</li>
                                <li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Air conditioning</li>
                                <li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Internet</li>
                                <li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Radio</li>
                                <li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Balcony</li>
                                <li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Roof terrace</li>
                                <li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Cable TV</li>
                                <li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Electricity</li>
                            </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="list-unstyled proprerty-features">
                                    <li><i class="zmdi zmdi-star text-warning m-r-5"></i>Terrace</li>
                                    <li><i class="zmdi zmdi-star text-warning m-r-5"></i>Cofee pot</li>
                                    <li><i class="zmdi zmdi-star text-warning m-r-5"></i>Oven</li>
                                    <li><i class="zmdi zmdi-star text-warning m-r-5"></i>Towelwes</li>
                                    <li><i class="zmdi zmdi-star text-warning m-r-5"></i>Computer</li>
                                    <li><i class="zmdi zmdi-star text-warning m-r-5"></i>Grill</li>
                                    <li><i class="zmdi zmdi-star text-warning m-r-5"></i>Parquet</li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="list-unstyled proprerty-features">
                                    <li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Dishwasher</li>
                                    <li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near Green Zone</li>
                                    <li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near Church</li>
                                    <li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near Hospital</li>
                                    <li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near School</li>
                                    <li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near Shop</li>
                                    <li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Natural Gas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Location</strong> <small>Description text here...</small> </h2>
                    </div>
                    <div class="body">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=svdezAlqZP2WIeKGiLW4EUnoJvnxVP7i&amp;width=100%&amp;height=400&amp;lang=tr_TR&amp;sourceType=constructor&amp;scroll=true"></script>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card member-card">
                    <div class="header l-parpl">
                        <h4 class="m-t-10"><?= $full_name ?></h4>
                    </div>
                    <div class="member-img photo">
                        <a href="profile?id=<?=encodeString($property_details->agent_id);?>"><img src="<?= $agent_property->agent_photo; ?>" class="rounded" alt="profile-image"></a>
                    </div>
                    <div class="body">
                        <div class="col-12">
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook" href="<?= $agent_property->facebook; ?>"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter" href="<?= $agent_property->twitter; ?>"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="linkedin" href="<?= $agent_property->linkedin; ?>"><i class="zmdi zmdi-linkedin"></i></a></li>
                            </ul>
                            <p class="text-muted"><?= $agent_property->address; ?>, <?= $agent_property->state; ?>, <?= $agent_property->country; ?></p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <h5>18</h5>
                                <small>Properties</small>
                            </div>
                            <div class="col-4">
                                <h5>2GB</h5>
                                <small>For Rent</small>
                            </div>
                            <div class="col-4">
                                <h5>65,6$</h5>
                                <small>For Sale</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2><strong>Location</strong></h2>
                        
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
                                        <td><span class="badge badge-primary"><?= $property_details->property_type; ?></span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bedrooms:</th>
                                        <td><?= $property_details->bedrooms; ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <th scope="row">Bathrooms:</th>
                                        <td><?= $property_details->bedrooms; ?></td>
                                    </tr> -->
                                    <tr>
                                        <th scope="row">Square ft:</th>
                                        <td><?= $property_details->square_ft; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Garage Spaces:</th>
                                        <td><?= $property_details->car_parking; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Land Size:</th>
                                        <td>721 m²</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Floors:</th>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Listed for:</th>
                                        <td>15 days</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Available:</th>
                                        <td>Immediately</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pets:</th>
                                        <td>Pets Allowed</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer --> 
<?php require_once "includes/footer.php"; ?>