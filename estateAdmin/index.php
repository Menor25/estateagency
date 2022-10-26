<?php
    require_once "includes/header.php";
?>

<!-- Left Sidebar -->
<?php require_once "includes/sidebar.php"; ?>

<!-- Right Sidebar -->
<?php require_once "includes/right-sidebar.php"; ?>



<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard
                <small class="text-muted">Welcome to Elema Igie Ventures</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="home"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>                
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3 class="number count-to" data-from="0" data-to="128" data-speed="2000" data-fresh-interval="700" >128</h3>                        
                        <p class="text-muted">New Project</p>
                        <div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        <small>Change 27%</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3 class="number count-to" data-from="0" data-to="758" data-speed="2000" data-fresh-interval="700" >758</h3>
                        <p class="text-muted">Total Project</p>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        <small>Change 9%</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3 class="number count-to" data-from="0" data-to="2521" data-speed="2000" data-fresh-interval="700" >2521</h3>
                        <p class="text-muted">Properties for Sale/Rent</p>
                        <div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        <small>Change 17%</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3>$ 24,500</h3>
                        <p class="text-muted">Total Earnings(Years)</p>
                        <div class="progress">
                            <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        <small>Change 13%</small>
                    </div>
                </div>
            </div>            
        </div>
  

        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial2" value="66" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#4CAF50" readonly>
                        <h6 class="m-t-20">Apartment</h6>
                        <p class="displayblock m-b-0">29% Average <i class="zmdi zmdi-trending-up"></i></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial2" value="26" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#7b69ec" readonly>
                        <h6 class="m-t-20">Office</h6>
                        <p class="displayblock m-b-0">45% Average <i class="zmdi zmdi-trending-down"></i></p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial3" value="76" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#f9bd53" readonly>
                        <h6 class="m-t-20">Shop</h6>
                        <p class="displayblock m-b-0">75% Average <i class="zmdi zmdi-trending-up"></i></p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="card tasks_report">
                    <div class="body">
                        <input type="text" class="knob dial4" value="88" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#00adef" readonly>
                        <h6 class="m-t-20">Villa</h6>
                        <p class="displayblock m-b-0">12% Average <i class="zmdi zmdi-trending-up"></i></p>
                        
                    </div>
                </div>
            </div>            
        </div>

    
    </div>
</section>
<!-- footer --> 
<?php require_once "includes/footer.php"; ?>