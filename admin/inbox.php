<?php require_once('../inc/header.php');?>
<?php require_once('../inc/sidebar.php');?>
            <!-- Header Ends -->
          <?php
          if(isset($_GET['update'])){
              $update=$conn->query("UPDATE sent_documents SET status_id=2 WHERE receiver='$_SESSION[admin]'");
          }

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
                         <a href="documents" class="btn btn-purple btn-block">Compose</a>
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
                                  <a href="tracker" class="list-group-item"><i class="fa fa-paper-plane-o m-r-5"></i>Sent Mail</a>
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
                                        <button type="button" class="btn btn-success"><i class="fa fa-inbox"></i></button>
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
                        
                        <div class="panel panel-default m-t-20">
                            <div class="panel-body">
                            
                                <table class="table table-hover mails">
                                    <tbody>
                                        <?php
                                        $inbox1 = $conn->query("SELECT users.*, registered_documents.*, sent_documents.* FROM users, registered_documents, sent_documents WHERE users.pfnumber=sent_documents.sender AND
                                                                registered_documents.id=sent_documents.doc_id AND sent_documents.receiver='$_SESSION[admin]'");
                                                                 while($result=mysqli_fetch_assoc($inbox1)){
                                                            ?>

                                        <tr>
                                            <td class="mail-select">
                                                <label class="cr-styled">
                                                    <input type="checkbox"><i class="fa"></i>
                                                </label>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td>
                                                <a href="read?id=<?php echo $result['send_id'];?>"><?php echo ucfirst($result['fname']." ".$result['lname']);?></a>
                                            </td>
                                            <td>
                                                <a href="read?id=<?php echo $result['send_id'];?>"><i class="fa fa-circle text-info m-r-15"></i><?php echo $result['message'];?></a>
                                            </td>
                                            <td>
                                                <a href="../resources/documents/<?php echo $result['document_name'];?>"><i class="fa fa-paperclip"></i></a>
                                            </td>
                                            <td class="text-right">
                                                <?php
                                                echo $date=date($result['date_received']);

                                                 ?>

                                            </td>
                                        </tr>
                                              <?php
                                                                                                                        }

                                                                                ?>

                                    </tbody>
                                </table>

                                <hr>

                                <div class="row">
                                    <div class="col-xs-7">
                                        Showing 1 - 20 of 289
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="btn-group pull-right">
                                          <button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i></button>
                                          <button type="button" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- panel body -->
                        </div> <!-- panel -->
                    </div> <!-- end Col-9 -->

                </div><!-- End row -->


            </div> <!-- END Wraper -->

        <?php require_once('../inc/footer.php');?>