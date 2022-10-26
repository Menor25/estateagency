<?php require_once "includes/header.php"; ?>

<?php
    $properties = Property::find_all();

    //print_r($properties);
    $sn = 1;
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
                    <h2>Property List
                        <small>Welcome to <?= $welcome; ?></small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                    <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right ml-3" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
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
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table td_2 table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Property</th>
                                            <th>Address</th>
                                            <th>Beds</th>
                                            <th>sq. ft</th>
                                            <th>Agent</th>
                                            <th>Sale/Rent</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($properties as $property): ?>
                                           <?php $agent_properties = Agent::find_all_by_id($property->agent_id, 'id'); 
                                            //print_r($agent_properties);

                                            foreach ($agent_properties as $agent_property):
                                           ?>
                                        
                                            <tr>
                                            
                                                <td><?= $sn; ?></td>
                                                
                                                    <td>
                                                        <a href="property-detail?id=<?= encodeString($property->id); ?>">
                                                            <?= $property->property_name; ?>
                                                        </a>
                                                    </td>
                                                   
                                                <td><?= $property->property_address; ?></td>
                                                <td><?= $property->bedrooms; ?></td>
                                                <td><?= $property->square_ft; ?></td>

                                                <td>
                                                   <?php 
                                                    
                                                    echo $agent_property->first_name . " " . $agent_property->last_name;
                                                        
                                                   
                                                     
                                                   ?>
                                                </td>
                                               
                                                <td><span class="badge badge-primary mb-0"><?= $property->sales_type; ?></span></td>
                                                <td><?= $property->property_price; ?></td>
                                                <td>
                                                    <a href="edit-property?edit=<?= encodeString($property->id); ?>" class="text-success" title='Edit'>
                                                        <i class="zmdi zmdi-edit m-r-5"></i>
                                                    </a> | 
                                                    <a href="property-list?delete=<?= encodeString($property->id); ?>" class="text-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this property?')" title='Delete'>
                                                        <i class="zmdi zmdi-delete m-r-5"></i>
                                                    </a>
                                                </td>
                                                
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php
                                         $sn++; 
                                        endforeach; 
                                           
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