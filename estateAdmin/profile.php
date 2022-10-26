<?php
    require_once "includes/header.php";

if (isset($_GET['delete'])) {
        //Delete agent
        $id = $_GET['delete'];
        
        $decoded_id = decodeString($id);
    
        deleteAgent($decoded_id, 'agent', 'agent');
}

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


$agent_properties = Property::find_all_by_id($decoded_id, 'agent_id');


?>



<!-- Left Sidebar -->
<?php require_once "includes/sidebar.php"; ?>


<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Agent Profile
                <small class="text-muted">Welcome to <?= $welcome; ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="agent">Agent</a></li>
                    <li class="breadcrumb-item active">Agent Profile</li>
                </ul>                
            </div>
        </div>
    </div>    
    <div class="container-fluid">       
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card member-card">
                    <div class="header l-cyan">
                        <h4 class="m-t-10"><?= $fullName; ?></h4>
                    </div>
                    <div class="member-img" style="width: 100px; height: 100px; border-radius: 100%;
                        margin-left: auto; margin-right: auto;">
                        <a href="profile.html" class="">
                        <img src="<?= $agent_photo; ?>" class="rounded-circle" alt="profile-image"
                        style="width: 100%; height: 100%; border-radius: 100%;">
                        </a>
                    </div>
                    <div class="body">
                        <div class="col-12">
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook" href="<?= $facebook; ?>"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter" href="<?= $twitter; ?>"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="linkedin" href="<?= $linkedin; ?>"><i class="zmdi zmdi-linkedin"></i></a></li>
                            </ul>
                            <p class="text-muted"><?= $address; ?>, <?= $state; ?></p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <a href="edit-agent?edit=<?= encodeString($agent_Id); ?>" class="btn btn-secondary">
                                Edit Details
                            </a>  
                            </div>
                            <div class="col-6">
                                <a href="profile?delete=<?= encodeString($agent_Id); ?>" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this agent?')">
                                Delete Agent
                                </a>
                               
                            </div>
                                              
                        </div>
                    </div>
                </div>
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">About</a></li>
                       
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane body active" id="about">
                            <small class="text-muted">Position: </small>
                            <p>Agent</p>
                            <hr>
                            <small class="text-muted">Estate: </small>
                            <p><?= $welcome; ?></p>
                            <hr>
                            <small class="text-muted">Email address: </small>
                            <p><?= $email; ?></p>
                            <hr>
                            <small class="text-muted">Phone: </small>
                            <p><?= $phone; ?></p>                            
                            <hr>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mypost">My Properties</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usersettings">Setting</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane blog-page active" id="mypost">

                        <div class="row clearfix">
                            
                            <div class="col-lg-12 col-md-12">
                                <table class="table table-striped">
                               
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope='col'>S/N</th>
                                            <th scope='col'>Title</th>
                                            <th scope='col'>Type</th>
                                            <th scope='col'>Price</th>
                                            <th scope='col'>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sn = 1; ?>
                                    <?php foreach ($agent_properties as $property):  ?>
                                        <tr>
                                            <td><?= $sn; ?></td>
                                            <td><?= $property->property_name; ?></td>
                                            <td><?= $property->property_type; ?></td>
                                            <td><?= $property->property_price; ?></td>
                                            <td><?= $property->property_address; ?></td>
                                        </tr>
                                        <?php 
                                        $sn++;
                                    endforeach; 
                                    ?>
                                    </tbody>
                                    
                                </table>
                            </div> 
                            
                           
                        </div>
                        <ul class="pagination pagination-primary">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>                
                    </div>

                    <div role="tabpanel" class="tab-pane" id="usersettings">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Account</strong> Settings</h2>
                            </div>
                            <div class="body">
                                <form action="" method="post">
                                    <div class="row clearfix">

                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <input id="procheck1" name="status" value="1" type="checkbox" required>
                                                <label for="procheck1">Activate Agent</label>
                                            </div>
                                        
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-round">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer --> 
<?php require_once "includes/footer.php"; ?>
