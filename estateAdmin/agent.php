<?php
    require_once "includes/header.php";

    //Getting all agent
    $allAgent = getAllData("agent");
?>

<!-- Left Sidebar -->
<?php require_once "includes/sidebar.php"; ?>

<!-- Right Sidebar -->
<?php require_once "includes/right-sidebar.php"; ?>

<!-- Main Content -->
<section class="content agent">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>All Agents
                <small class="text-muted">Welcome to <?= $welcome; ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                

                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="agent">Agents</a></li>
                    <li class="breadcrumb-item active">All Agents</li>
                </ul>                
            </div>
        </div>
    </div>
    <div class="container-fluid">        
        <div class="row clearfix">
            <?php
                foreach ($allAgent as $agent) {
                    $first_name     = $agent['first_name'];
                    $last_name      = $agent['last_name'];
                    $other_name     = $agent['other_name'];
                    $gender         = $agent['gender'];
                    $biography      = $agent['biography'];
                    $phone          = $agent['phone'];
                    $username       = $agent['username'];
                    $email          = $agent['email'];
                    $status         = $agent['status'];
                    $agent_id       = $agent['id'];
                    $agent_photo    = $agent['agent_photo'];
                    $address        = $agent['address'];
                    $state          = $agent['state'];
                    $country        = $agent['country'];
                    $facebook       = $agent['facebook'];
                    $twitter        = $agent['twitter'];
                    $linkedin       = $agent['linkedin'];

                    $fullName = $first_name . " " . $last_name . " " . $other_name;

                    ?>

            <div class="col-lg-4 col-md-6">
                <div class="card agent">
                    <div class="agent-avatar" style="height: 350px;"> 
                    <a href="profile?id=<?= encodeString($agent_id); ?>"> 
                        <img src="<?= $agent_photo; ?>" class="img-fluid " alt="" style="height: 100%; width: 100%"> 
                    </a> 
                    </div>
                    <div class="agent-content">
                        <div class="agent-name">
                            <h4><a href="profile?id=<?= encodeString($agent_id); ?>"><?= $fullName; ?></a></h4>
                            <span><?= $address; ?>, <?= $state; ?></span>
                        </div>
                        <ul class="agent-contact-details">
                            <li><i class="zmdi zmdi-phone"></i><span><?= $phone; ?></span></li>
                            <li><i class="zmdi zmdi-email"></i><?= $email; ?></li>
                        </ul>
                        <ul class="social-icons">
                            <li><a class="facebook" href="<?= $facebook; ?>"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a class="twitter" href="<?= $twitter; ?>"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a class="linkedin" href="<?= $linkedin; ?>"><i class="zmdi zmdi-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<!-- Footer --> 
<?php require_once "includes/footer.php"; ?>