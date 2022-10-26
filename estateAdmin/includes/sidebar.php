<?php
        require_once "../estateAdmin/private/autoload.php";
        require_once "../estateAdmin/private/init.php";
?>
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image">
                        <a href="user-profile?id=<?=encodeString($_SESSION['agent_id'])?>">
                            <img src="<?= $_SESSION['agent_photo']; ?>" alt="User">
                        </a>
                    </div>
                    <div class="detail">
                        <h4><?= $_SESSION['first_name']; ?></h4>
                        <small>Agent</small>                        
                    </div>
                    <a href="events.html" title="Events"><i class="zmdi zmdi-calendar"></i></a>
                    <a href="mail-inbox.html" title="Inbox"><i class="zmdi zmdi-email"></i></a>
                    <a href="contact.html" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a>
                    <a href="chat.html" title="Chat App"><i class="zmdi zmdi-comments"></i></a>
                    <a href="sign-in.html" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                </div>
            </li>

            <li class="active open"><a href="home"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Property</span> </a>
                <ul class="ml-menu">
                    <li><a href="property-list">Property List</a></li>
                    <li><a href="property-grid">Property Grid</a></li>                       
                    <li><a href="add-property">Add Property</a></li>
                    <li><a href="property-detail.html">Property Detail</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Amenities</span> </a>
                <ul class="ml-menu">
                    <li><a href="amenities-list">Amenities List</a></li>                     
                    <li><a href="add-amenities">Add Property</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Types</span> </a>
                <ul class="ml-menu">
                    <li><a href="apartment.html">Apartment</a></li>
                    <li><a href="office.html">Office</a></li>
                    <li><a href="shop.html">Shop</a></li>                        
                    <li><a href="villa.html">Villa</a></li>
                </ul>
            </li><li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Agents</span> </a>
                <ul class="ml-menu">
                    <li><a href="agent">All Agents</a></li>
                    <li><a href="add-agent">Add Agent</a></li>                       
                    <li><a href="profile.html">Agent Profile</a></li>
                    <li><a href="invoices.html">Agent Invoice</a></li>
                </ul>
            </li>
            <li><a href="map.html"><i class="zmdi zmdi-pin"></i><span>Map</span></a></li>
            <li><a href="reports.html"><i class="zmdi zmdi-file-text"></i><span>Reports</span></a></li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>App</span> </a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Inbox</a></li>
                    <li><a href="chat.html">Chat</a></li>
                    <li><a href="events.html">Calendar</a></li>
					<li><a href="file-dashboard.html">File Manager</a></li>
                    <li><a href="contact.html">Contact list</a></li>
                    <li><a href="blog-dashboard.html">Blog</a></li>
                </ul>
            </li>
            <li class="header">EXTRA COMPONENTS</li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Widgets</span> </a>
                <ul class="ml-menu">
                    <li><a href="widgets-app.html">Apps Widgetse</a></li>
                    <li><a href="widgets-data.html">Data Widgetse</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Authentication</span> </a>
                <ul class="ml-menu">
                    <li><a href="sign-in.html">Sign In</a> </li>
                    <li><a href="sign-up.html">Sign Up</a> </li>
                    <li><a href="forgot-password.html">Forgot Password</a> </li>
                    <li><a href="404.html">Page 404</a> </li>
                    <li><a href="500.html">Page 500</a> </li>
                    <li><a href="page-offline.html">Page Offline</a> </li>
                    <li><a href="locked.html">Locked Screen</a> </li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Sample Pages</span> </a>
                <ul class="ml-menu">
                    <li><a href="blank.html">Blank Page</a> </li>
                    <li> <a href="image-gallery.html">Image Gallery</a> </li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="timeline.html">Timeline</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="invoices.html">Invoices</a></li>
                    <li><a href="search-results.html">Search Results</a></li>
                </ul>
            </li>
            <li class="header">Extra</li>
            <li>
                <div class="progress-container progress-primary m-t-10">
                    <span class="progress-badge">Traffic this Month</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                            <span class="progress-value">67%</span>
                        </div>
                    </div>
                </div>
                <div class="progress-container progress-info">
                    <span class="progress-badge">Server Load</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                            <span class="progress-value">86%</span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>