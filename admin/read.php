<?php require_once('../inc/header.php');?>
<?php require_once('../inc/sidebar.php');?>
            <!-- Header Ends -->
          <?php
          if(isset($_GET['update'])){
              $update=$conn->query("UPDATE sent_documents SET status_id=2 WHERE receiver='$_SESSION[admin]'");
          }
           @$id=$_REQUEST['id'];
          ?>

            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">Inbox</h3>
                </div>

                <div class="row">

                    <!-- Left sidebar -->
                    <div class="col-md-3">
                         <a href="email-compose.html" class="btn btn-purple btn-block">Compose</a>
                        <div class="panel panel-default p-0  m-t-20">
                            <div class="panel-body p-0">
                                <div class="list-group no-border mail-list">
                                      <?php
                                    $inbox=$conn->query("SELECT sent_documents.*,doc_tracking.*,state.*
                                    FROM sent_documents, doc_tracking,state
                                    WHERE sent_documents.doc_id=doc_tracking.doc_id
                                    AND state.status_id=doc_tracking.status_id AND doc_tracking.status_id=1
                                    AND sent_documents.receiver='$_SESSION[admin]'");
                                    $row=$inbox->fetch_array();
                                    $count1=$inbox->num_rows;
                                    ?>
                                  <a href="#" class="list-group-item active"><i class="fa fa-download m-r-5"></i>Inbox <b>(<?php echo number_format($count1);?>)</b></a>
                                  <a href="#" class="list-group-item"><i class="fa fa-paper-plane-o m-r-5"></i>Sent Mail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Left sidebar -->


                    <!-- Right Sidebar -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group">
                                        <a href="inbox" class="btn btn-success"><i class="fa fa-fw fa-level-up fa-rotate-270"></i></a>
                                        <button type="button" class="btn btn-success"><i class="fa fa-exclamation-circle"></i></button>
                                        <button type="button" class="btn btn-success"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-folder"></i>
                                        <b class="caret"></b>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#fakelink">Action</a></li>
                                            <li><a href="#fakelink">Another action</a></li>
                                            <li><a href="#fakelink">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#fakelink">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tag"></i>
                                        <b class="caret"></b>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#fakelink">Action</a></li>
                                            <li><a href="#fakelink">Another action</a></li>
                                            <li><a href="#fakelink">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#fakelink">Separated link</a></li>
                                        </ul>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          More
                                          <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#fakelink">Dropdown link</a></li>
                                          <li><a href="#fakelink">Dropdown link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- End row -->

                                           <!-- Message -->
                        <div class="panel panel-default m-t-20">
                                 <?php
                                        $inbox = $conn->query("SELECT users.*, registered_documents.*, sent_documents.* FROM users, registered_documents, sent_documents WHERE users.pfnumber=sent_documents.sender AND
                                                                registered_documents.id=sent_documents.doc_id AND sent_documents.receiver='$_SESSION[admin]'AND sent_documents.send_id='$id'");
                                        $result=mysqli_fetch_assoc($inbox);
                                                            ?>
                            <div class="panel-body">
                                <div class="media m-b-30 ">
                                    <a href="#" class="pull-left">
                                        <img alt="" src="img/avatar-2.jpg" class="media-object thumb-sm">
                                    </a>
                                    <div class="media-body">
                                        <span class="media-meta pull-right"> <?php
                                                echo $date=date($result['date_received']);

                                                 ?></span>

                                        <h4 class="text-primary m-0"><?php echo ucfirst($result['fname']." ".$result['lname']);?></h4>
                                        <small class="text-muted"><?php echo $result['sender'];?></small>
                                    </div>
                                </div> <!-- media -->

                                <p><b>Hae...</b></p>
                                <p><?php echo $result['message'];?></p>
                                <hr>

                                <h4> <i class="fa fa-paperclip m-r-10 m-b-10"></i> Attachment(s) <span></span> </h4>


                                <a href="../resources/documents/<?php echo $result['document_name'];?>" class="thumb-sm"> <embed src="" type="pdf" alt="attachment" class="br-radius"><?php echo $result['document_name'];?> </a>

                            </div> <!-- panel-body -->
                        </div> <!-- End panel -->

                        <!-- End message -->
                    </div> <!-- end Col-9 -->

                </div><!-- End row -->


            </div> <!-- END Wraper -->

        <?php require_once('../inc/footer.php');?>