<?php require_once('../inc/header.php');?>
<?php require_once('../inc/sidebar.php');?>

 <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">Welcome To DocTrack System</h3>

                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-pink">
                            <i class="ion-eye"></i>
                               <?php
                            $q=$conn->query("SELECT * FROM registered_documents WHERE document_by='$_SESSION[admin]'");
                            $registered=$q->num_rows;
                            ?>
                            <h2 class="m-0 counter"><?php echo number_format($registered);?></h2>
                            <div>Registered Docs</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-purple">
                            <i class="ion-paper-airplane"></i>
                                 <?php
                            $q=$conn->query("SELECT * FROM sent_documents WHERE sender='$_SESSION[admin]' GROUP BY doc_id");
                            $send=$q->num_rows;
                            ?>
                            <h2 class="m-0 counter"><?php echo number_format($send);?></h2>
                            <div>Sent Documents</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-info">
                            <i class="ion-ios7-pricetag"></i>
                                 <?php
                            $q=$conn->query("SELECT * FROM sent_documents WHERE receiver='$_SESSION[admin]' GROUP BY doc_id");
                            $receive=$q->num_rows;
                            ?>
                            <h2 class="m-0 counter"><?php echo number_format($receive);?></h2>
                            <div>Received Documents</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-success">
                            <i class="ion-android-contacts"></i>
                                         <?php
                                                        $q=$conn->query("SELECT * FROM sent_documents WHERE sender='$_SESSION[admin]' GROUP BY doc_id");
                            
                                                        $track=$q->num_rows;
                                                        ?>
                            <h2 class="m-0 counter"><?php echo number_format($track);?></h2>
                            <div>Tracked Documents</div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->
            <?php require_once('../inc/footer.php');?>