

 <body>

        <!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="dashboard" class="logo-expanded">

                    <img src="../resources/img/logo.png" style="width: 40px; height: 40px;" alt="logo">
                    <span class="nav-label">DocTrack</span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="has-submenu active"><a href="dashboard"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="ion-flask"></i> <span class="nav-label">My Documents</span></a>
                        <ul class="list-unstyled">
                            <li><a href="documents">View Documents</a></li>
                            <!--<li><a href="send_document">Send Document</a></li>-->
                        </ul>
                    </li>
                     <li class="has-submenu"><a href="#"><i class="ion-settings"></i> <span class="nav-label">My Inbox</span></a>
                        <ul class="list-unstyled">
                            <li><a href="inbox?update=true">Inbox</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="ion-settings"></i> <span class="nav-label">Document Tracking</span></a>
                        <ul class="list-unstyled">
                            <li><a href="tracker">Document Tracker</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Right navbar -->
                <ul class="list-inline navbar-right top-menu top-right-menu">

                    <!-- mesages -->  
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-envelope-o "></i>
                            <?php
                            $inbox=$conn->query("SELECT * FROM sent_documents WHERE status_id=1 AND sent_documents.receiver='$_SESSION[user]'");
                           //$row=$inbox->fetch_array();
                            $count1=$inbox->num_rows;
                            ?>
                            <span class="badge badge-sm up bg-purple count"><?php echo number_format($count1);?></span>
                        </a>
                        <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5001">
                            <li>
                                <p>You have&nbsp; <?php echo number_format($count1);?> Document(s)</p>
                            </li>
                            <li>
                                <p><a href="inbox?update=true"  class="text-right">See received messages</a></p>
                            </li>
                        </ul>
                    </li>
                    <!-- /messages -->

                    <!-- user login dropdown start-->
                    <li class="dropdown text-center">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                            <span class="username"><?php echo $fullname;?> </span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                            <li><a href="profile.html"><i class="fa fa-briefcase"></i><?php echo $pf;?></a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li>
                            <li><a href="../logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->       
                </ul>
                <!-- End right navbar -->

            </header>