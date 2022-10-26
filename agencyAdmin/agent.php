<?php require_once "includes/header.php"; ?>

<?php

     //Getting all agent
     $allAgent = getAllData("agent");

?>
<?php
    if (isset($_GET['delete'])) {
        //Delete agent
        $id = $_GET['delete'];
        
        $decoded_id = decodeString($id);
    
        deleteAgent($decoded_id, 'agent', 'agent');
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
                    <h2>Agent
                        <small>Welcome to <?= $welcome; ?></small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                    
                    <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right ml-3" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Agent</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table td_2 table-striped table-hover js-basic-example dataTable vcenter">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>City</th>
                                            
                                            <th>Property</th>
                                            <th>Value</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            <?php
                $sn = 1;
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
                                        <tr>
                                            <td><?= $sn; ?></td>
                                            <td><img src="<?= $agent_photo; ?>" class="w30 rounded mr-2"
                                                    alt="Agent Photo"><a href="profile?id=<?= encodeString($agent_id); ?>"><?= $fullName; ?></a> </td>
                                            <td> <?= $email; ?></td>
                                            <td><?= $phone; ?></td>
                                            <td><?= $state; ?></td>
                                            
                                            <td>53</td>
                                            <td>$2,800</td>
                                            <td class="text-warning">
                                                <a href="edit-agent?edit=<?= encodeString($agent_id); ?>" class="text-success" title='Edit'>
                                                        <i class="zmdi zmdi-edit m-r-5"></i>
                                                </a> | 
                                                <a href="agent?delete=<?= encodeString($agent_id); ?>" class="text-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this agent?')" title='Delete'>
                                                        <i class="zmdi zmdi-delete m-r-5"></i>
                                                </a>
                                            </td>
                                        </tr>

            <?php 
                $sn++;
            }; 
            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "includes/footer.php"; ?>