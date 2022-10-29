<?php
        require_once "../agencyAdmin/private/autoload.php";
        require_once "../agencyAdmin/private/init.php";
?>
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i
                    class="zmdi zmdi-home m-r-5"></i>Home</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user"><i
                    class="zmdi zmdi-account m-r-5"></i>Agent</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="member-img"
                            style="width: 100px; height: 100px; border-radius: 100%;
                         margin-left: auto; margin-right: auto;">
                               
                                    <img src="<?= $_SESSION['agent_photo']; ?>" alt="User" alt="user-photo" 
                                    style="width: 100%; height: 100%; border-radius: 100%;">
                                
                                
                            </div>
                            
                            <div class="detail">
                                <h4><?= $_SESSION['first_name']; ?></h4>
                                <small>Agent</small>
                            </div>
                            <a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a>
                        </div>
                    </li>
                    <!-- <li class="header">MAIN</li> -->
                    <li class="active open"><a href="home"><i
                                class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-city"></i><span>Property</span></a>
                        <ul class="ml-menu">
                            <li><a href="property-list">Property List</a></li>
                            <!-- <li><a href="property-list3.html">3 Column</a></li>
                            <li><a href="property-list4.html">4 Column</a></li> -->
                            <li><a href="add-property">Add Property</a></li>
                            <li><a href="add-property-image">Add Property Images</a></li>
                            <li><a href="property-images">Property Image List</a></li>
                            <!-- <li><a href="property-detail">Property Detail</a></li> -->
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-city"></i><span>Types</span></a>
                        <ul class="ml-menu">
                            <li><a href="apartment.html">Apartment</a></li>
                            <li><a href="office.html">Office</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="villa.html">Villa</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-accounts-outline"></i><span>Agents</span></a>
                        <ul class="ml-menu">
                            <li><a href="agent">All Agents</a></li>
                            <li><a href="add-agent">Add Agent</a></li>
                            <!-- <li><a href="profile">Agent Profile</a></li> -->
                            <li><a href="invoices.html">Agent Invoice</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-case-check"></i><span>Contract</span></a>
                        <ul class="ml-menu">
                            <li><a href="contract-add.html">Add New</a></li>
                            <li><a href="contract-list.html">List</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-image"></i><span>Slide</span></a>
                        <ul class="ml-menu">
                            <li><a href="settings">Add Slide</a></li>
                            <li><a href="update-settings">Update Slide</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-brightness-high"></i><span>Settings</span></a>
                        <ul class="ml-menu">
                            <li><a href="setting">Settings</a></li>
                            <!-- <li><a href="update-settings">Update Settings</a></li> -->
                        </ul>
                    </li>
                    <!-- <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-apps"></i><span>App</span></a>
                        <ul class="ml-menu">
                            <li><a href="mail-inbox.html">Inbox</a></li>
                            <li><a href="chat.html">Chat</a></li>
                            <li><a href="events.html">Calendar</a></li>
                            <li><a href="contact.html">Contact list</a></li>
                            <li><a href="blog-dashboard.html">Blog</a></li>
                        </ul>
                    </li> -->
                    
 
                    <!-- <li>
                        <a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-lock"></i><span>Authentication</span></a>
                        <ul class="ml-menu">
                            <li><a href="sign-in.html">Sign In</a></li>
                            <li><a href="sign-up.html">Sign Up</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                            <li><a href="404.html">Page 404</a></li>
                            <li><a href="500.html">Page 500</a></li>
                            <li><a href="page-offline.html">Page Offline</a></li>
                            <li><a href="locked.html">Locked Screen</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Sample
                                Pages</span></a>
                        <ul class="ml-menu">
                            <li><a href="blank.html">Blank Page</a></li>
                            <li><a href="image-gallery.html">Image Gallery</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="search-results.html">Search Results</a></li>
                        </ul>
                    </li>
                    <li class="header">Extra</li>
                    <li>
                        <div class="progress-container progress-primary m-t-10">
                            <span class="progress-badge">Traffic this Month</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                                    <span class="progress-value">67%</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-container progress-info">
                            <span class="progress-badge">Server Load</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                                    <span class="progress-value">86%</span>
                                </div>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                        <div class="member-img"
                            style="width: 100px; height: 100px; border-radius: 100%;
                         margin-left: auto; margin-right: auto;">
                               
                                    <img src="<?= $_SESSION['agent_photo']; ?>" alt="User" alt="user-photo" 
                                    style="width: 100%; height: 100%; border-radius: 100%;">
                                
                                
                            </div>
                            <div class="detail">
                                <h4>Michael</h4>
                                <small>Agent</small>
                            </div>
                            <a title="facebook" href="<?= $_SESSION['facebook']; ?>"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="<?= $_SESSION['twitter']; ?>"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="<?= $_SESSION['instagram']; ?>"><i class="zmdi zmdi-instagram"></i></a>
                            <p class="text-muted"><?= $_SESSION['address']; ?>, <?= $_SESSION['state']; ?>, <?= $_SESSION['country']; ?></p>
                            
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Email address: </small>
                        <p><?= $_SESSION['email']; ?></p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p><?= $_SESSION['phone']; ?></p>
                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>