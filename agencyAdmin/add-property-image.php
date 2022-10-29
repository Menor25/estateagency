<?php require_once "includes/header.php"; ?>

<?php
//Add new property
$properties = Property::find_all();
//print_r($property);
if(Is_Post_request()){
   
  
    addPropertyImage(
        $agent_id = $_SESSION['agent_id'],
        $property_id = $_POST['property_id'],
        $property_images = $_FILES['property_images']

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
                    <h2>Property Image
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
                            <h2><strong>Image</strong> Details </h2>
                            
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select name="property_id" id="">
                                            <option value="">Select Property</option>
                                            <?php foreach ($properties as $property): ?>
                                                <option value="<?= $property->id; ?>"><?= $property->property_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-6">
                                        <div class="mb-3 mt-2">
                                            <label class="form-label" for="formFileLg">Property Image(s)</label>
                                            <input name="property_images" type="file" id="formFileLg" 
                                            
                                            class="form-control form-control-lg" multiple />
                                        </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round">Add Image</button>
                                    
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