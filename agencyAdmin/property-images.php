<?php require_once "includes/header.php"; ?>

<?php
    $property_images = PropertyImages::find_all();

    //print_r($property_images);
    $sn = 1;

    if(Is_Post_request()){
        header("Location: add-property-image");
    }
?>
<?php
    if (isset($_GET['delete'])) {
        //Delete agent
        $id = $_GET['delete'];
        
        $decoded_id = decodeString($id);
    
        deletePropertyImage($decoded_id, 'property_images', 'property-images');
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
                    <h2>Property List
                        <small>Welcome to <?= $welcome; ?></small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                <form action="" method="post">
                    <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right ml-3" type="submit">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                </form>
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
                                            <th>Property Name</th>
                                            <th>Image</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($property_images as $property_image): ?>
                                           <?php $properties = Property::find_all_by_id($property_image->property_id, 'id'); 
                                            //print_r($properties);

                                            foreach ($properties as $property):
                                           ?>
                                        
                                            <tr>
                                            
                                                <td><?= $sn; ?></td>
                                                
                                                    <td>
                                                        <a href="property-detail?id=<?= encodeString($property_image->id); ?>">
                                                            <?= $property->property_name; ?>
                                                        </a>
                                                    </td>
                                                   
                                                <td>
                                                    <img src="<?= $property_image->property_image; ?>" alt="Property Image"
                                                     width="100">
                                                </td>


                                               
                                               
                                                
                                                <td>
                                                    
                                                    <a href="property-images?delete=<?= encodeString($property_image->id); ?>" class="text-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this image?')" title='Delete'>
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