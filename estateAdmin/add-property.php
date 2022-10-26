<?php
    require_once "includes/header.php";

//Add new property
$property = new Property();
if (Is_Post_request()) {
    if($property) {
    $property->agent_id = $_SESSION['agent_id'];
    $property->property_name = initialCap($_POST['property_name']);
    $property->property_desc = initialCap($_POST['property_desc']);
    $property->property_type = $_POST['property_type'];
    $property->property_price = $_POST['property_price'];
    $property->property_address = initialCap($_POST['property_address']);
    $property->bedrooms = $_POST['bedrooms'];
    $property->square_ft = $_POST['square_ft'];
    $property->car_parking = $_POST['car_parking'];
    $property->year_built = $_POST['year_built'];
    $property->dinning_room = $_POST['dinning_room'];
    $property->kitchen = $_POST['kitchen'];
    $property->living_room = $_POST['living_room'];
    $property->master_bedroom = $_POST['master_bedroom'];
    $property->other_room = $_POST['other_room'];
    $property->city = initialCap($_POST['city']);
    $property->country = initialCap($_POST['country']);

    $property->set_file($_FILES['property_plan']);
    $property->save_user_and_image();
    }
    
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
                <h2>Add Property
                <small class="text-muted">Welcome to <?= $welcome; ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="property-list">Property</a></li>
                    <li class="breadcrumb-item active">Add Property</li>
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
                            <h2><strong>Basic</strong> Information <small>Description text here...</small> </h2>
                        
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" 
                                        name="property_name"
                                        value="<?php if(isset($property_name)){ echo $property_name;} ?>"
                                         placeholder="Property Name" required>
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize custom-border" 
                                            name="property_desc" 
                                            value="<?php if(isset($property_desc)){ echo $property_desc;} ?>"
                                            placeholder="Property Description" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Property</strong> For <small>Description text here...</small> </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="radio inlineblock m-r-25">
                                        <input type="radio" name="property_type" id="radio1" value="Rent"
                                        <?php if(isset($property_type) && $property_type == "Rent") {echo 'checked=""'; } ?>
                                        required>
                                        <label for="radio1">For Rent</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="property_type" id="radio2" value="Sale" 
                                        <?php if(isset($property_type) && $property_type == "Sale") {echo 'checked=""'; } ?>
                                        required>
                                        <label for="radio2">For Sale</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="property_price" class="form-control custom-border" 
                                        value="<?php if(isset($property_price)) {echo $property_price; } ?>"
                                        placeholder="Price / Rent" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize custom-border" 
                                        name="property_address" 
                                        placeholder="Property Address" required><?php if(isset($property_address)) {echo $property_address; } ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-dm-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" name="bedrooms" 
                                        value="<?php if(isset($bedrooms)){echo $bedrooms;} ?>" placeholder="Bedrooms" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-dm-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" name="square_ft" 
                                        value="<?php if(isset($square_ft)){echo $square_ft;} ?>"
                                        placeholder="Square ft" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-dm-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" name="car_parking" 
                                        value="<?php if(isset($car_parking)){ echo $car_parking;} ?>"
                                        placeholder="Car Parking" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-dm-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" name="year_built" 
                                        value="<?php if(isset($year_built)){ echo $year_built; } ?>"
                                        placeholder="Year Built" required>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Dimensions</strong> <small>Description text here...</small> </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control custom-border" name="dinning_room" 
                                        value="<?php if(isset($dinning_room)){ echo $dinning_room;} ?>"
                                        placeholder="Dining Room" required>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control custom-border" name="kitchen" 
                                        value="<?php if(isset($kitchen)){echo $kitchen;} ?>"
                                        placeholder="Kitchen" required>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control custom-border" name="living_room" 
                                        value="<?php if(isset($living_room)){echo $living_room;} ?>"
                                        placeholder="Living Room" required>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" name="master_bedroom" 
                                        value="<?php if(isset($master_bedroom)){echo $master_bedroom;} ?>"
                                        placeholder="Master Bedroom" required>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-border" name="other_room" 
                                        value="<?php if(isset($other_room)){echo $other_room;} ?>"
                                        placeholder="Other Room" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <!-- <div class="header">
                            <h2><strong>General</strong> Amenities<small>Description text here...</small> </h2>
                        </div> -->
                        <div class="body">
                            <!-- <div class="row">
                                <div class="col-sm-12">
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox21" type="checkbox">
                                        <label for="checkbox21">Swimming pool</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox22" type="checkbox">
                                        <label for="checkbox22">Terrace</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox23" type="checkbox" checked="">
                                        <label for="checkbox23">Air conditioning</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox24" type="checkbox" checked="">
                                        <label for="checkbox24">Internet</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox25" type="checkbox">
                                        <label for="checkbox25">Balcony</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox26" type="checkbox">
                                        <label for="checkbox26">Cable TV</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox27" type="checkbox">
                                        <label for="checkbox27">Computer</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox28" type="checkbox" checked="">
                                        <label for="checkbox28">Dishwasher</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox29" type="checkbox" checked="">
                                        <label for="checkbox29">Near Green Zone</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox30" type="checkbox">
                                        <label for="checkbox30">Near Church</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox31" type="checkbox">
                                        <label for="checkbox31">Near Estate</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox32" type="checkbox">
                                        <label for="checkbox32">Cofee pot</label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row clearfix">                            
                                <div class="col-sm-12">
                                    
                
                                        <div class="fallback">
                                            <input name="property_plan" type="file" required multiple />
                                        </div>
                                    
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round">Submit</button>
                                    
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