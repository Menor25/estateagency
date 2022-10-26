<?php
    require_once "includes/header.php";


     $properties = Property::find_all();

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
                <h2>Property List
                <small class="text-muted">Welcome to <?= $welcome; ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                

                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="property-list">Property</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ul>                
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <!-- <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Search</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <select class="form-control show-tick">
                                    <option value="">-- Select --</option>
                                    <option value="10">Any Status</option>
                                    <option value="20">For Sale</option>
                                    <option value="20">For Rent</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick">
                                    <option value="10">Any Type</option>
                                    <option value="10">Apartments</option>
                                    <option value="20">Houses</option>
                                    <option value="20">Commercial</option>
                                    <option value="20">Garages</option>
                                    <option value="20">Lots</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick">
                                    <option value="">-- All States --</option>
                                    <option value="10">Alaska</option>
                                    <option value="20">California</option>
                                    <option value="20">Colorado</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick">
                                    <option value="">-- All States --</option>
                                    <option value="10">Alaska</option>
                                    <option value="20">California</option>
                                    <option value="20">Colorado</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control show-tick">
                                    <option value="">-- All Cities --</option>
                                    <option value="10">New York</option>
                                    <option value="20">Los Angeles</option>
                                    <option value="20">Chicago</option>
                                    <option value="20">Houston</option>
                                    <option value="20">Phoenix</option>
                                    <option value="20">San Antonio</option>
                                    <option value="20">Queens</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control show-tick">
                                    <option value="">-- Beds --</option>
                                    <option value="20">1</option>
                                    <option value="20">2</option>
                                    <option value="20">3</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control show-tick">
                                    <option value="">-- Baths --</option>
                                    <option value="20">1</option>
                                    <option value="20">2</option>
                                    <option value="20">3</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group m-t-5">
                                    <input type="text" class="form-control" placeholder="Area Range">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group m-t-5">
                                    <input type="text" class="form-control" placeholder="Price Range">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-round btn-primary waves-effect">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12">
                <?php foreach ($properties as $property): ?>
                <div class="card property_list">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="property_image">
                                    <img class="img-thumbnail img-fluid" src="assets/images/image-gallery/1.jpg" alt="img">
                                    <span class="badge badge-danger"><?= $property->property_type; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <div class="property-content">
                                    <div class="detail">
                                        <h5 class="text-success m-t-0 m-b-0"><?= $property->property_price; ?></h5>
                                        <h4 class="m-t-0"><a href="property-detail?id=<?=encodeString($property->id); ?>" class="col-blue-grey"><?= $property->property_name; ?></a></h4>
                                        <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i><?= $property->property_address; ?>, <?= $property->city; ?>, <?= $property->country; ?></p>
                                        <p class="text-muted m-b-0"><?= $property->property_desc; ?></p>
                                    </div>
                                    <div class="property-action m-t-15">
                                        <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span><?= $property->square_ft; ?></span></a>
                                        <a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span><?= $property->bedrooms; ?></span></a>
                                        <a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span><?= $property->car_parking; ?></span></a>
                                        <a href="#" title="Year Built"><i class="zmdi zmdi-globe-alt"></i><span> <?= $property->year_built; ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Footer --> 
<?php require_once "includes/footer.php"; ?>