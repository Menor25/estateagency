<?php
    require_once "includes/header.php";

if (isset($_GET['delete'])) {
        //Delete agent
        $id = $_GET['delete'];
        
        $decoded_id = decodeString($id);
    
        deleteAgent($decoded_id, 'agent', 'agent');
}

//User profile details

$fullName = $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " " . $_SESSION['other_name'];


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
                        <img src="<?= $_SESSION['agent_photo']; ?>" class="rounded-circle" alt="profile-image"
                        style="width: 100%; height: 100%; border-radius: 100%;">
                        </a>
                    </div>
                    <div class="body">
                        <div class="col-12">
                            <ul class="social-links list-unstyled">
                                
                                <li><a title="facebook" href="<?= $facebook; ?>"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter" href="<?= $_SESSION['twitter']; ?>"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="linkedin" href="<?= $_SESSION['linkedin']; ?>"><i class="zmdi zmdi-linkedin"></i></a></li>
                            </ul>
                            <p class="text-muted"><?= $_SESSION['address']; ?>, <?= $_SESSION['state']; ?></p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <a href="edit-agent?edit=<?= encodeString($_SESSION['agent_id']); ?>" class="btn btn-secondary">
                                Edit Details
                            </a>  
                            </div>
                            <div class="col-6">
                                <a href="profile?delete=<?= encodeString($_SESSION['agent_id']); ?>" class="btn btn-danger"
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
                            <p><?= $_SESSION['email']; ?></p>
                            <hr>
                            <small class="text-muted">Phone: </small>
                            <p><?= $_SESSION['phone']; ?></p>                            
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
                            <div class="col-lg-6 col-md-12">
                                <div class="card single_post">
                                    <div class="body">
                                        <h3 class="m-t-0 m-b-5"><a href="blog-details.html">WTCR from 2018: new rules, more cars, more races</a></h3>
                                        <ul class="meta">
                                            <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-label col-lime"></i>Sports</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                                        </ul>
                                    </div>                    
                                    <div class="body">
                                        <div class="img-post m-b-15">
                                            <img src="assets/images/blog/blog-page-3.jpg" alt="Awesome Image">
                                            <div class="social_share">                            
                                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-facebook"></i></button>
                                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-twitter"></i></button>
                                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-instagram"></i></button>
                                            </div>
                                        </div>
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</p>
                                        <a href="blog-details.html" title="read more" class="btn btn-round btn-info">Read More</a>                        
                                    </div>
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-12">
                                <div class="card single_post">
                                    <div class="body">
                                        <h3 class="m-t-0 m-b-5"><a href="blog-details.html">CSS Timeline Examples from CodePen</a></h3>
                                        <ul class="meta">
                                            <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-label col-green"></i>Web Design</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                                        </ul>
                                    </div>                    
                                    <div class="body">
                                        <div class="img-post m-b-15">
                                            <img src="assets/images/blog/blog-page-4.jpg" alt="Awesome Image">
                                            <div class="social_share">                            
                                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-facebook"></i></button>
                                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-twitter"></i></button>
                                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-instagram"></i></button>
                                            </div>
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
                                        <a href="blog-details.html" title="read more" class="btn btn-round btn-info">Read More</a>                        
                                    </div>
                                </div>
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
