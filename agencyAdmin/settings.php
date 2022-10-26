<?php require_once "includes/header.php"; ?>

<?php
//Add new property
$property = new Property();
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
   
    if($property) {
        
        $property->agent_id = $_SESSION['agent_id'];
        $property->property_name = initialCap($_POST['property_name']);
        $property->property_desc = initialCap($_POST['property_desc']);
        $property->property_type = $_POST['property_type'];
        $property->sales_type = $_POST['sales_type'];
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
        $property->state = initialCap($_POST['state']);
        $property->country = initialCap($_POST['country']);
        $property->swimming_pool = $swimming_pool;
        $property->terrace = $terrace;
        $property->air_conditioning = $air_conditioning;
        $property->internet = $internet;
        $property->balcony = $balcony;
        $property->cable_tv = $cable_tv;
        $property->computer = $computer;
        $property->dishwasher = $dishwasher;
        $property->near_green_zone = $near_green_zone;
        $property->near_church = $near_church;
        $property->near_estate = $near_estate;
        $property->near_school = $near_school;
        $property->near_hospital = $near_hospital;
        $property->cofee_pot = $cofee_pot;
    
        $property->set_file($_FILES['property_plan']);
        $property->save_user_and_image();
        }
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
                <div class="col-lg-12">
                <form action="" id="frmFileUpload" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic</strong> Settings </h2>
                            
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Company Address"
                                         name="company_address" 
                                         value="<?php if(isset($company_address)){ echo $company_address;} ?>" required>
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
                                        <input type="text" class="form-control" placeholder="State"
                                         name="state" value="<?php if(isset($state)){ echo $state;} ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Country"
                                         name="country" value="<?php if(isset($country)){ echo $country;} ?>" required>
                                    </div>
                                </div>
                                
                            </div>
                            <h6 class="mt-4">Account Information</h6>
                            <div class="row clearfix">
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Company Email"
                                         name="company_email" value="<?php if(isset($company_email)){echo $company_email;} ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Company Phone"
                                         name="company_phone" value="<?php if(isset($company_phone)) {echo $company_phone;} ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Company Mobile"
                                         name="company_mobile" value="<?php if(isset($company_mobile)) {echo $company_mobile;} ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Internation Office Address"
                                         name="international_office" value="<?php if(isset($international_office)){ echo $international_office;} ?>">
                                    </div>
                                </div>
                               
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"
                                            placeholder="Company Terms of Usage"
                                             name="terms_of_usage"
                                             ><?php if(isset($terms_of_usage)){ echo $terms_of_usage;} ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"
                                            placeholder="Company Privacy Policy"
                                             name="privacy_policy"
                                             ><?php if(isset($privacy_policy)){ echo $privacy_policy;} ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    
                                        <div class="mb-3 mt-2">
                                            <label class="form-label" for="formFileLg">Company Logo</label>
                                            <input name="company_logo" type="file" id="formFileLg" 
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