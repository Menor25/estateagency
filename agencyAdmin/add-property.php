<?php require_once "includes/header.php"; ?>

<?php
//Add new property
// $property = new Property();
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
   
    addProperty(

        $agent_id = $_SESSION['agent_id'],
        $property_name = initialCap($_POST['property_name']),
        $property_desc = initialCap($_POST['property_desc']),
        $property_type = $_POST['property_type'],
        $sales_type = $_POST['sales_type'],
        $property_price = $_POST['property_price'],
        $property_address = initialCap($_POST['property_address']),
        $bedrooms = $_POST['bedrooms'],
        $square_ft = $_POST['square_ft'],
        $car_parking = $_POST['car_parking'],
        $year_built = $_POST['year_built'],
        $dinning_room = $_POST['dinning_room'],
        $kitchen = $_POST['kitchen'],
        $living_room = $_POST['living_room'],
        $master_bedroom = $_POST['master_bedroom'],
        $other_room = $_POST['other_room'],
        $city = initialCap($_POST['city']),
        $state = initialCap($_POST['state']),
        $country = initialCap($_POST['country']),
        $swimming_pool = $swimming_pool,
        $terrace = $terrace,
        $air_conditioning = $air_conditioning,
        $internet = $internet,
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
        $property_plan 	= $_FILES['property_plan']['name']
    
    );
        //print_r($amenities);
       //echo $property->swimming_pool;
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
                    <h2>Property Add
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
            <?php if (isset($_SESSION[$error])): ?>
                            <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                                <?php
                                    echo $_SESSION[$error];
                                    unset($_SESSION[$error]);

                                ?>
                            </div>
                        <?php endif; ?>
                <div class="col-lg-12">
                <form action="" id="frmFileUpload" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic</strong> Information </h2>
                            
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Property Name"
                                         name="property_name" 
                                         value="<?php if(isset($property_name)){ echo $property_name;} ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City"
                                         name="city" value="<?php if(isset($city)){ echo $city;} ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="State Location"
                                         name="state" value="<?php if(isset($state)){ echo $state;} ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Country"
                                         name="country" value="<?php if(isset($country)){ echo $country;} ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="property_desc"
                                                placeholder="Property Description"><?php if(isset($property_desc)){ echo $property_desc;} ?></textarea>
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
                                        
                                        <?php
                                            if(isset($property_type)) {
                                                echo "<option value='$property_type'>$property_type</option>";
                                            } else {
                                                echo "<option value='' disabled selected>-- Property Types --</option>";
                                            }
                                        ?>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Office Space">Office Space</option>
                                        <option value="Shop">Shop </option>
                                        <option value="Land">Land </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Price"
                                         name="property_price" value="<?php if(isset($property_price)){echo $property_price;} ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Bedrooms"
                                         name="bedrooms" value="<?php if(isset($bedrooms)) {echo $bedrooms;} ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Square ft"
                                         name="square_ft" value="<?php if(isset($square_ft)){ echo $square_ft;} ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Car Parking"
                                         name="car_parking" value="<?php if(isset($car_parking)){ echo $car_parking;} ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Year Built"
                                         name="year_built" value="<?php if(isset($year_built)) {echo $year_built;} ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"
                                            placeholder="Property Address"
                                             name="property_address"
                                             ><?php if(isset($property_address)){ echo $property_address;} ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4">Dimensions</h6>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Dining Room"
                                         name="dinning_room" value="<?php if(isset($dinning_room)) {echo $dinning_room;} ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Kitchen"
                                         name="kitchen" value="<?php if(isset($kitchen)){echo $kitchen;} ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Living Room"
                                         name="living_room" value="<?php if(isset($living_room)){ echo $living_room;} ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Master Bedroom"
                                         name="master_bedroom" value="<?php if(isset($master_bedroom)){echo $master_bedroom;} ?>">
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
                                         name="other_room" value="<?php if(isset($other_room)){ echo $other_room;} ?>">
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4">General Amenities</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox21" type="checkbox" name="amenity[]" 
                                         value="Swimming Pool"
                                         <?php if(isset($swimming_pool)){ echo "checked=''";} ?>>
                                        <label for="checkbox21">Swimming Pool</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox22" type="checkbox" name="amenity[]" 
                                        value="Terrace"
                                         <?php if(isset($terrace)){ echo "checked=''";} ?>>
                                        <label for="checkbox22">Terrace</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox23" type="checkbox" name="amenity[]"
                                         value="Air Conditioning"
                                          <?php if(isset($air_conditioning)){echo "checked=''";} ?>>
                                        <label for="checkbox23">Air Conditioning</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox24" type="checkbox" name="amenity[]"
                                         value="Internet" 
                                         <?php if(isset($internet)){echo "checked=''";} ?>>
                                        <label for="checkbox24">Internet</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox25" type="checkbox" name="amenity[]" 
                                        value="Balcony" 
                                        <?php if(isset($balcony)){echo "checked=''";} ?>>
                                        <label for="checkbox25">Balcony</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox26" type="checkbox" name="amenity[]" 
                                        value="Cable TV" 
                                        <?php if(isset($cable_tv)){echo "checked=''";} ?>>
                                        <label for="checkbox26">Cable TV</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox27" type="checkbox" name="amenity[]" 
                                        value="Computer" 
                                        <?php if(isset($computer)){echo "checked=''";} ?>>
                                        <label for="checkbox27">Computer</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox28" type="checkbox" name="amenity[]" 
                                        value="Dishwasher" 
                                        <?php if(isset($dishwasher)){echo "checked=''";} ?>>
                                        <label for="checkbox28">Dishwasher</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox29" type="checkbox" name="amenity[]" 
                                        value="Near Green Zone" 
                                        <?php if(isset($near_green_zone)){ echo "checked=''";} ?>>
                                        <label for="checkbox29">Near Green Zone</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox30" type="checkbox" name="amenity[]" 
                                        value="Near Church" 
                                        <?php if(isset($near_church)){ echo "checked=''";} ?>>
                                        <label for="checkbox30">Near Church</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox31" type="checkbox" name="amenity[]" 
                                        value="Near Estate" 
                                        <?php if(isset($near_estate)){echo "checked=''";} ?>>
                                        <label for="checkbox31">Near Estate</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox32" type="checkbox" name="amenity[]" 
                                        value="Near School" 
                                        <?php if(isset($near_school)){echo "checked=''";} ?>>
                                        <label for="checkbox32">Near School</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox33" type="checkbox" name="amenity[]" 
                                        value="Near Hospital" 
                                        <?php if(isset($near_hospital)){echo "checked=''";} ?>>
                                        <label for="checkbox33">Near Hospital</label>
                                    </div>
                                    <div class="checkbox inlineblock m-r-20">
                                        <input id="checkbox34" type="checkbox" name="amenity[]" 
                                        value="Cofee Pot" 
                                        <?php if(isset($cofee_pot)){ echo "checked=''";} ?>>
                                        <label for="checkbox34">Cofee Pot</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    
                                        <div class="mb-3 mt-2">
                                            <label class="form-label" for="formFileLg">Property Plan</label>
                                            <input name="property_plan" type="file" id="formFileLg" 
                                            value="<?php if(isset($property_plan)){ echo $property_plan;} ?>" 
                                            class="form-control form-control-lg" multiple />
                                        </div>
                                    </form>
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

    <?php require_once "includes/footer.php"; ?>