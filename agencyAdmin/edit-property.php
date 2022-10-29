<?php require_once "includes/header.php"; ?>

<?php
 
//print_r($property);
if(Is_Post_request()){
    $amenities = $_POST['amenity'];
    $swimming_pool = ""; $terrace = ""; $air_conditioning = ""; $internet = ""; $balcony = "";
    $cable_tv = ""; $computer = ""; $dishwasher = ""; $near_green_zone = ""; $near_church = "";
    $near_estate = ""; $near_school = ""; $near_hospital = ""; $cofee_pot = "";

    foreach ($amenities as $key => $amenity) {
        if($amenity == "Swimming Pool"){
           $swimming_pool = $amenity;
        }
        if ($amenity == "Terrace") {
            $terrace = $amenity;
        }
        if ($amenity == "Air Conditioning") {
            $air_conditioning = $amenity;
        }
        if ($amenity == "Internet") {
            $internet = $amenity;
        }
        if ($amenity == "Balcony") {
            $balcony = $amenity;
        }
        if ($amenity == "Cable TV") {
            $cable_tv = $amenity;
        }
        if ($amenity == "Computer") {
            $computer = $amenity;
        }
        if ($amenity == "Dishwasher") {
            $dishwasher = $amenity;
        }
        if ($amenity == "Near Green Zone") {
            $near_green_zone = $amenity;
        }
        if ($amenity == "Near Church") {
            $near_church = $amenity;
        }
        if ($amenity == "Near Estate") {
            $near_estate = $amenity;
        }
        if ($amenity == "Near School") {
            $near_school = $amenity;
        }
        if ($amenity == "Near Hospital") {
            $near_hospital = $amenity;
        }
        if ($amenity == "Cofee Pot") {
            $cofee_pot = $amenity;
        }
       
    }
   
    edit_property(
        $property_name = $_POST['property_name'], 
        $property_desc = $_POST['property_desc'], 
        $property_type = $_POST['property_type'], 
        $sales_type = $_POST['sales_type'], 
        $property_price = $_POST['property_price'], 
        $property_address = $_POST['property_address'], 
        $bedrooms = $_POST['bedrooms'], 
        $square_ft = $_POST['square_ft'], 
        $car_parking = $_POST['car_parking'], 
        $year_built = $_POST['year_built'], 
        $dinning_room = $_POST['dinning_room'],  
        $kitchen = $_POST['kitchen'], 
        $living_room = $_POST['living_room'], 
        $master_bedroom = $_POST['master_bedroom'], 
        $other_room = $_POST['other_room'], 
        $state = $_POST['state'], 
        $country = $_POST['country'], 
        $swimming_pool = $swimming_pool, 
        $terrace = $terrace, 
        $air_conditioning = $air_conditioning, 
        $internet =  $internet, 
        $balcony = $balcony, 
        $cable_tv = $cable_tv, 
        $computer = $computer, 
        $dishwasher = $dishwasher, 
        $near_green_zone = $near_green_zone, 
        $near_church = $near_church, 
        $near_estate = $near_estate, 
        $near_school = $near_school, 
        $near_hospital = $near_hospital, 
        $cofee_pot = $cofee_pot, 
        $property_plan = $_FILES['property_plan']['name'], 
        $id = $_POST['id']
    );
        //print_r($amenities);
       //echo $property->swimming_pool;
}
?>

<?php
if (Is_Get_request()) {
	$prop_id = $_GET['edit'];
	
	$decoded_id = decodeString($prop_id);

	$getProperty =  getDataById($decoded_id, 'tbl_properties');

	foreach ($getProperty as $property) {
        $property_name = $property['property_name'];
        $property_desc = $property['property_desc'];
        $property_type = $property['property_type'];
        $sales_type = $property['sales_type'];
        $property_price = $property['property_price'];
        $property_address = $property['property_address'];
        $bedrooms = $property['bedrooms'];
        $square_ft = $property['square_ft'];
        $car_parking = $property['car_parking'];
        $year_built = $property['year_built'];
        $dinning_room = $property['dinning_room'];
        $kitchen = $property['kitchen'];
        $living_room = $property['living_room'];
        $master_bedroom = $property['master_bedroom'];
        $other_room = $property['other_room'];
        $state = $property['state'];
        $country = $property['country'];
        $swimming_pool = $property['swimming_pool'];
        $terrace =  $property['terrace'];
        $air_conditioning =  $property['air_conditioning'];
        $internet =  $property['internet'];
        $balcony =  $property['balcony'];
        $cable_tv =  $property['cable_tv'];
        $computer =  $property['computer'];
        $dishwasher =  $property['dishwasher'];
        $near_green_zone =  $property['near_green_zone'];
        $near_church =  $property['near_church'];
        $near_estate =  $property['near_estate'];
        $near_school =  $property['near_school'];
        $near_hospital =  $property['near_hospital'];
        $cofee_pot =  $property['cofee_pot'];
        $property_plan =  $property['property_plan'];
        $id = $property['id'];
	}
}
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
                    <h2>Edit Property
                        <small>Welcome to <?= $welcome; ?></small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                    
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Property</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                <form action="" id="frmFileUpload" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic</strong> Information </h2>
                            
                        </div>
                        <div class="body">
                        <?php if (isset($_SESSION[$error])): ?>
                            <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                                <?php
                                    echo $_SESSION[$error];
                                    unset($_SESSION[$error]);

                                ?>
                            </div>
                        <?php endif; ?>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="text" class="form-control" placeholder="Property Name"
                                         name="property_name" 
                                         value="<?php echo $property_name; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="State Location"
                                         name="state" value="<?php echo $state; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Country"
                                         name="country" value="<?php echo $country; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="property_desc"
                                                placeholder="Property Description"><?php echo $property_desc; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4">Property Information</h6>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="radio inlineblock m-r-25">
                                        <input type="radio" name="sales_type" id="radio1" 
                                        value="For Rent" <?php if (isset($sales_type)) {echo "checked=''";} ?>>
                                        <label for="radio1">For Rent</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="sales_type" id="radio2" 
                                        value="For Sale"  <?php if (isset($sales_type)) {echo "checked=''";} ?>>
                                        <label for="radio2">For Sale</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control show-tick" name="property_type" required>
                                        

                                        <option value='<?= $property_type; ?>'><?= $property_type; ?></option>
                                           
                                        <option value="Apartment">Apartment</option>
                                        <option value="Office Space">Office Space</option>
                                        <option value="Shop">Shop </option>
                                        <option value="Land">Land </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Price"
                                         name="property_price" value="<?php echo $property_price; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Bedrooms"
                                         name="bedrooms" value="<?php echo $bedrooms; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Square ft"
                                         name="square_ft" value="<?php echo $square_ft; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Car Parking"
                                         name="car_parking" value="<?php echo $car_parking; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Year Built"
                                         name="year_built" value="<?php echo $year_built; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"
                                            placeholder="Property Address"
                                             name="property_address"
                                             ><?php echo $property_address; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4">Dimensions</h6>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Dining Room"
                                         name="dinning_room" value="<?php echo $dinning_room; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Kitchen"
                                         name="kitchen" value="<?php echo $kitchen; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Living Room"
                                         name="living_room" value="<?php echo $living_room; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Master Bedroom"
                                         name="master_bedroom" value="<?php echo $master_bedroom; ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Bedroom 2">
                                    </div>
                                </div> -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Other Room"
                                         name="other_room" value="<?php echo $other_room; ?>">
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4">General Amenities</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox21" type="checkbox" name="amenity[]" 
                                         value="Swimming Pool"
                                         <?php if($swimming_pool === "Swimming Pool"){ echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox21">Swimming Pool</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox22" type="checkbox" name="amenity[]" 
                                        value="Terrace"
                                         <?php if($terrace === "Terrace"){ echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox22">Terrace</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox23" type="checkbox" name="amenity[]"
                                         value="Air Conditioning"
                                          <?php if($air_conditioning === "Air Conditioning"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox23">Air Conditioning</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox24" type="checkbox" name="amenity[]"
                                         value="Internet" 
                                         <?php if($internet === "Internet"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox24">Internet</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox25" type="checkbox" name="amenity[]" 
                                        value="Balcony" 
                                        <?php if($balcony === "Balcony"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox25">Balcony</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox26" type="checkbox" name="amenity[]" 
                                        value="Cable TV" 
                                        <?php if($cable_tv === "Cable TV"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox26">Cable TV</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox27" type="checkbox" name="amenity[]" 
                                        value="Computer" 
                                        <?php if($computer === "Computer"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox27">Computer</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox28" type="checkbox" name="amenity[]" 
                                        value="Dishwasher" 
                                        <?php if($dishwasher === "Dishwasher"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox28">Dishwasher</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox29" type="checkbox" name="amenity[]" 
                                        value="Near Green Zone" 
                                        <?php if($near_green_zone === "Near Green Zone"){ echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox29">Near Green Zone</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox30" type="checkbox" name="amenity[]" 
                                        value="Near Church" 
                                        <?php if($near_church === "Near Church"){ echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox30">Near Church</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox31" type="checkbox" name="amenity[]" 
                                        value="Near Estate" 
                                        <?php if($near_estate === "Near Estate"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox31">Near Estate</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox32" type="checkbox" name="amenity[]" 
                                        value="Near School" 
                                        <?php if($near_school === "Near School"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox32">Near School</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox33" type="checkbox" name="amenity[]" 
                                        value="Near Hospital" 
                                        <?php if($near_hospital === "Near Hospital"){echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox33">Near Hospital</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox34" type="checkbox" name="amenity[]" 
                                        value="Cofee Pot" 
                                        <?php if($cofee_pot === "Cofee Pot"){ echo "checked=''";}else{echo " ";} ?>>
                                        <label for="checkbox34">Cofee Pot</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    
                                        <div class="mb-3 mt-2">
                                            <label class="form-label" for="formFileLg">Property Plan</label>
                                            <input name="property_plan" value="<?= $property_plan; ?>" type="file" id="formFileLg" 
                                            class="form-control form-control-lg" multiple />
                                            <img src="<?php echo $property_plan; ?>" alt="Property plan" width="100px">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round">Update</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "includes/footer.php"; ?>