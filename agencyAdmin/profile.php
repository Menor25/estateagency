<?php require_once "includes/header.php"; ?>

<?php
//Staement for getting agent profile details
if (isset($_GET['id'])) {
	$agentId = $_GET['id'];
	
	$decoded_id = decodeString($agentId);

	$allAgent =  getDataById($decoded_id, 'agent');

	foreach ($allAgent as $agent) {
        # code...
		$first_name     = $agent['first_name'];
		$last_name      = $agent['last_name'];
		$other_name     = $agent['other_name'];
		$gender          = $agent['gender'];
		$biography          = $agent['biography'];
		$phone         = $agent['phone'];
		$username       = $agent['username'];
        $agent_photo    = $agent['agent_photo'];
        $email      = $agent['email'];
        $address  = $agent['address'];
        $state    = $agent['state'];
        $country     = $agent['country'];
        $facebook        = $agent['facebook'];
        $twitter      = $agent['twitter'];
        $linkedin      = $agent['linkedin'];
        $status         = $agent['status'];
        $agent_Id        = $agent['id'];
        

    }
    $fullName = $first_name . " " . $last_name . " " . $other_name;
}

?>
<body class="theme-purple">

    <?php require_once "includes/loader.php"; ?>    

    <div class="overlay"></div>

    <?php require_once "includes/navigation.php"; ?>

    <?php require_once "includes/sidebar.php"; ?>

    <?php require_once "includes/right-sidebar.php"; ?>

    <section class="content profile-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Agent Profile
                        <small>Welcome to <?= $welcome; ?></small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right ml-3" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-7 col-md-12">
                    <div class="card profile-header">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="profile-image float-md-right" 
                                    style="width: 100px; height: 100px; border-radius: 100%;
                        margin-left: auto; margin-right: auto;"> 
                                        <img src="<?= $agent_photo; ?>" class="rounded-circle" 
                                        alt="profile-image"
                                        style="width: 100%; height: 100%; border-radius: 100%;"> 
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <h4 class="m-t-0 m-b-0"><strong><?= $fullName; ?></strong> </h4>
                                    <span class="job_post">Agent</span>
                                    <p><?= $address; ?></p>
                                    <div>
                                        <button class="btn btn-primary btn-round">
                                            <a href="<?= $twitter; ?>" target="_blank" style="color: white;">Follow</a>
                                        </button>
                                        <!-- <button class="btn btn-primary btn-round btn-simple">Message</button> -->
                                    </div>
                                    <p class="social-icon m-t-5 m-b-0">
                                        <a title="Twitter" href="<?= $twitter; ?>"><i
                                                class="zmdi zmdi-twitter"></i></a>
                                        <a title="Facebook" href="<?= $facebook; ?>"><i
                                                class="zmdi zmdi-facebook"></i></a>
                                        <a title="Google-plus" href="<?= $linkedin; ?>"><i
                                                class="zmdi zmdi-linkedin"></i></a>
                                        
                                        <!-- <a title="Instagram" href="javascript:void(0);"><i
                                                class="zmdi zmdi-instagram "></i></a> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-12">
                    <div class="card">
                        <ul class="row profile_state list-unstyled">
                            <li class="col-lg-4 col-md-4 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-camera col-amber"></i>
                                    <h5 class="m-b-0 number count-to" data-from="0" data-to="2365" data-speed="1000"
                                        data-fresh-interval="700">2365</h5>
                                    <small>Shots View</small>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-thumb-up col-blue"></i>
                                    <h5 class="m-b-0 number count-to" data-from="0" data-to="1203" data-speed="1000"
                                        data-fresh-interval="700">1203</h5>
                                    <small>Likes</small>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-comment-text col-red"></i>
                                    <h5 class="m-b-0 number count-to" data-from="0" data-to="324" data-speed="1000"
                                        data-fresh-interval="700">324</h5>
                                    <small>Comments</small>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-account text-success"></i>
                                    <h5 class="m-b-0 number count-to" data-from="0" data-to="1980" data-speed="1000"
                                        data-fresh-interval="700">1980</h5>
                                    <small>Profile Views</small>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-desktop-mac text-info"></i>
                                    <h5 class="m-b-0 number count-to" data-from="0" data-to="251" data-speed="1000"
                                        data-fresh-interval="700">251</h5>
                                    <small>Website View</small>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-attachment text-warning"></i>
                                    <h5 class="m-b-0 number count-to" data-from="0" data-to="52" data-speed="1000"
                                        data-fresh-interval="700">52</h5>
                                    <small>Attachment</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">About</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane body active" id="about">
                                <small class="text-muted">Email address: </small>
                                <p><?= $email; ?></p>
                                <hr>
                                <small class="text-muted">Phone: </small>
                                <p><?= $phone; ?></p>
                                <hr>
                                <small class="text-muted">Mobile: </small>
                                <p><?= $phone; ?></p>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#usersettings">Setting</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="usersettings">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Security</strong> Settings</h2>
                                </div>
                                <div class="body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="New Password">
                                    </div>
                                    <button class="btn btn-info btn-round">Save Changes</button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Account</strong> Settings</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Country">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea rows="4" class="form-control no-resize"
                                                    placeholder="Address Line 1"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-round">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "includes/footer.php"; ?>