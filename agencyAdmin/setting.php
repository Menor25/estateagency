<?php require_once "includes/header.php"; ?>

<?php
$edit_settings = Setting::find_by_id(2);
//Add new property
//$setting = new Setting();
//print_r($property);
if(Is_Post_request()){

    editSetting(

		$company_address 	= h($_POST['company_address']),
		$city 		= h($_POST['city']),
        $state 	= h($_POST['state']),
        $country 		= h($_POST['country']),
        $company_email 		= h($_POST['company_email']),
		$company_phone 			= h($_POST['company_phone']),
        $company_mobile 		= h($_POST['company_mobile']),
		$terms_of_usage 		= h($_POST['terms_of_usage']),
        $privacy_policy 		= h($_POST['privacy_policy']),
        $international_office 		    = h($_POST['international_office']),
        $company_logo 	= $_FILES['company_logo']['name'],
        $facebook 		= h($_POST['facebook']),
        $twitter 		    = h($_POST['twitter']),
        $linkedin 		    = h($_POST['linkedin']),
        $instagram 		= h($_POST['instagram']),
        $id 		    = h($_POST['id'])

	);
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
                <?php if (isset($_SESSION[$error])): ?>
                            <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                                <?php
                                    echo $_SESSION[$error];
                                    unset($_SESSION[$error]);

                                ?>
                            </div>
                        <?php endif; ?>
                <form action="" id="frmFileUpload" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic</strong> Settings </h2>
                            
                        </div>
                        
                        <div class="body">
                            <div class="row clearfix">
                                <input type="hidden" name="id" value="<?= $edit_settings->id; ?>">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Company Address"
                                         name="company_address" 
                                         value="<?php echo $edit_settings->company_address; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City"
                                         name="city" value="<?php echo $edit_settings->city; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="State"
                                         name="state" value="<?php echo $edit_settings->state; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Country"
                                         name="country" value="<?php echo $edit_settings->country; ?>" required>
                                    </div>
                                </div>
                                
                            </div>
                            <h6 class="mt-4">Account Information</h6>
                            <div class="row clearfix">
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Company Email"
                                         name="company_email" value="<?php echo $edit_settings->company_email; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Company Phone"
                                         name="company_phone" value="<?php echo $edit_settings->company_phone; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Company Mobile"
                                         name="company_mobile" value="<?php echo $edit_settings->company_mobile; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Internation Office Address"
                                         name="international_office" value="<?php echo $edit_settings->international_office; ?>">
                                    </div>
                                </div>
                               
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"
                                            placeholder="Company Terms of Usage"
                                             name="terms_of_usage"
                                             ><?php echo $edit_settings->terms_of_usage; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"
                                            placeholder="Company Privacy Policy"
                                             name="privacy_policy"
                                             ><?php echo $edit_settings->privacy_policy; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4">Company Social Media<h6>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Facebook"
                                         name="facebook" 
                                         value="<?php echo $edit_settings->facebook; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Twitter"
                                         name="twitter" value="<?php echo $edit_settings->twitter; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Linkedin"
                                         name="linkedin" value="<?php echo $edit_settings->linkedin; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Instagram"
                                         name="instagram" value="<?php echo $edit_settings->instagram; ?>">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    
                                        <div class="mb-3 mt-2">
                                            <label class="form-label" for="formFileLg">Company Logo</label>
                                            <input name="company_logo" type="file" id="formFileLg" 
                                            value="<?= $edit_settings->company_logo; ?>" 
                                            class="form-control form-control-lg" multiple />
                                            <img src="<?= $edit_settings->company_logo; ?>" alt="Company Logo" width="100px">
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

    <?php require_once "includes/footer.php"; ?>