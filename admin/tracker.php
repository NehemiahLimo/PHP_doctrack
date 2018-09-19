<?php require_once('../inc/header.php');?>
<?php require_once('../inc/sidebar.php');?>


<?php


?>
 <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">Track Sent Documents</h3>
                </div>
                <div class="row">


                     <div class="col-lg-12">
                     <a class="btn btn-info" href="tracker_report">Generate Report</a>
                     <br>
                     <br>
                        <div class="portlet">
                            <div class="portlet-heading bg-info">
                                <h3 class="portlet-title">
                                    Document Tracking
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class = "message">
                                <!-- Add new document -->
                                    <?php //require_once('../inc/functions.php');
                                    if(isset($_POST['register_document'])){
                                        move_uploaded_file($_FILES['document']['tmp_name'],"../resources/documents/".$_FILES['document']['name']);
                                        $title=$_POST['title'];
                                        $document=$_FILES['document']['name'];

                                        $query=$conn->query("INSERT INTO registered_documents (title,document_by,document_name,date_registered) VALUES ('$title','$_SESSION[admin]','$document',NOW())") ;

                                           if($query){
                                            echo "<div class = 'alert alert-success message'>Successful Registration</div>";

                                        }
                                        else{
                                          echo "<div class = 'alert alert-danger message'>Error</div>".mysqli_error($conn)."";
                                        }
                                     }
                               ?>
                               <!-- end of add new document -->
                            </div>

                            <div id="bg-primary" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Document</th>
                                                    <th>Receiver</th>
                                                    <th>Track Date</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $count=1;
                                                $query = $conn->query("SELECT
																	    registered_documents.*
																	    , sent_documents.*
																	    , state.*
                                                                        ,users.*
																	FROM
																	    doctrack.sent_documents
																	    INNER JOIN doctrack.registered_documents
																	        ON (sent_documents.doc_id = registered_documents.id)
																	    INNER JOIN doctrack.state
																	        ON (sent_documents.status_id = state.status_id)
                                                                            INNER JOIN doctrack.users
                                                                            ON(sent_documents.receiver=users.pfnumber)
																	WHERE sent_documents.sender='$_SESSION[admin]'");
                                                while($result= mysqli_fetch_assoc($query)){
                                                    ?>

                                                <tr>
                                                    <td><?php echo $count;?></td>

                                                    <td><a href="../resources/documents/<?php echo $result['document_name'];?>"><?php echo $result['document_name'];?> </a>  </td>
                                                      <td><?php echo $result['fname']." ".$result['lname'];?></td>
                                                 <td><?php echo $result['date_received'];?></td>
                                                    <td>
                                                    <div class="btn-group">
                                                        <?php
                                                        if($result['status_id']==1){
                                                            ?>
                                                              <a href="" class="btn btn-info tooltip-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Document Track Status" id= ""><i class="glyphicon glyphicon-send"></i>&nbsp;<?php echo $result['status'];?></a>
                                                            <?php
                                                        }
                                                        else if($result['status_id']==2){
                                                            ?>
                                                            <a href="" class="btn btn-success tooltip-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Document Track Status" id= ""><i class="glyphicon glyphicon-inbox"></i>&nbsp;<?php echo $result['status'];?></a>
                                                            <?php
                                                        }
                                                        ?>

                                                       <!-- <a href="" class="btn btn-success tooltip-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Document Track Status" id= ""><i class="glyphicon glyphicon-inbox"></i>&nbsp;<?php echo $result['status'];?></a>-->

                                                    </div>
                                                    </td>
                                                                                               <!-- DELETE  PTA-->
                                               <div id="delete<?php echo $result['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content p-0 b-0">
                                                            <div class="panel panel-color panel-primary">
                                                                <div class="panel-heading">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="ion ion-close"></span></button>
                                                                    <h3 class="panel-title">Delete Selected Document</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                     <!-- Basic example -->
                                                                <div class="col-md-12">
                                                                    <form role="form" method="get" enctype="multipart/data" action="">
                                                                       <h3>Are you sure To delete this Record?</h3>

                                                                       	<div class="modal-footer">
                                                                            <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">No</button>
                                                                            <a href="delete_document.php<?php echo '?id='.$result['id']; ?>" class="btn btn-danger">Yes</a>
                                                                            </div>
                                                                    </form>
                                                                </div> <!-- col-->
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                <!-- END DELETE  PTA-->
                                                </tr>
                                                    <?php
                                                    $count++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->

                <!-- start of the register document portlet -->
                <div id="newDoc"  style="display:none">
                <div class="row">
                 <div class="col-lg-12">
                        <div class="portlet">
                            <div class="portlet-heading bg-info">
                                <h3 class="portlet-title">
                                    Registered Documents
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-primary" class="panel-collapse collapse in">
                                <div class="portlet-body">

                      <form role="form" method="post" enctype="multipart/form-data" id="register_doc">
                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="document-title">Title </label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Document Name">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="document">Document </label>
                                    <input type="file" name="document" id="document">
                                </div>
                              </div>
                          </div>


                          <button type="submit" name="register_document" class="btn btn-purple">Submit</button>
                                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- end of register document portlet -->
            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->
            <script type="text/javascript">
            function showDiv(toggle){
                document.getElementById(toggle).style.display = 'block';

                }
           /* $("name='register_new'").change(function () {
                $("#newDoc").toggle($(this).val());
            });*/
            </script>
            <?php require_once('../inc/footer.php');?>