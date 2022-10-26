<?php
    require_once "includes/header.php";

//Add new property
$amenity = new Amenity();
if (Is_Post_request()) {
    if($amenity) {
        $amenity->property_id = $_POST['property_id'];
        $amenity->balcony = $_POST['property_id'];
        $amenity->deck = $_POST['property_id'];
        $amenity->outdoor_kitchen = $_POST['property_id'];
        $amenity->tennis_court = $_POST['property_id'];
        $amenity->sun_room = $_POST['property_id'];
        $amenity->cable = $_POST['property_id'];
        $amenity->internet = $_POST['property_id'];
        $amenity->swimming_pool = $_POST['property_id'];
        $amenity->air_conditioning = $_POST['property_id'];
        $amenity->near_church = $_POST['property_id'];
        $amenity->near_hospital = $_POST['property_id'];
        $amenity->near_school = $_POST['property_id'];


    $amenity->create();
    }
    
}
?>
<?php
    $properties = Property::find_all();
    // print_r($properties);
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
                <h2>Add Amenities
                <small class="text-muted">Welcome to <?= $welcome; ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="property-list">Property</a></li>
                    <li class="breadcrumb-item active">Add Amenities</li>
                </ul>                
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <form action="" method="post" id="frmFileUpload" class="dropzone m-b-15 m-t-15" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic</strong> Amenities</h2>
                        
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <!-- <label for="Property">Property</label> -->
                                        <select name="property_id" id="" required>
                                            <option value="" disabled selected>Select Property</option>
                                            <?php foreach ($properties as $property): ?>

                                                <option value="<?= $property->id; ?>"><?= $property->property_name; ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" 
                                        name="city" 
                                        value="<?php if(isset($city)){ echo $city;} ?>"
                                        placeholder="City Located" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" 
                                        name="country" 
                                        value="<?php if(isset($country)){ echo $country;} ?>"
                                        placeholder="Country" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Footer --> 
<?php require_once "includes/footer.php"; ?>