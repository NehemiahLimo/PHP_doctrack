<?php require_once('../inc/header.php');?>
<?php require_once('../inc/sidebar.php');?>


<?php


?>
 <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">Registered Users</h3>
                </div>
                <div class="row">
                        <div class="portlet">
                            <div class="portlet-heading bg-info">
                                <h3 class="portlet-title">
                                    Registered Users
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
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Full Name</th>
                                                    <th>PF Number</th>
                                                    <th>Position</th>
                                                    <th>User Type</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $count=1;
                                                $query = $conn->query("SELECT users.*, position.*, roles.* FROM users, position, roles WHERE roles.role_id=users.role AND position.position_id=users.position_id");
                                                while($result= mysqli_fetch_assoc($query)){
                                                    ?>

                                                <tr>
                                                    <td><?php echo $count;?></td>

                                                    <td><?php echo strtoupper($result['fname'].' '.$result['mname'].' '.$result['lname']);?> </td>
                                                     <td><?php echo strtoupper($result['pfnumber']);?></td>
                                                    <td><?php echo $result['position_name'];?></td>
                                                    <td><?php echo $result['role_name'];?></td>
                                                    <td>
                                                    <div class="btn-group">
                                                            <a href="user_id=<?php echo $result['id'];?>" class="btn btn-danger tooltip-btn" data-target="#delete<?php echo $result['id'];?>" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User"><i class="glyphicon glyphicon-trash">&nbsp;Delete</i></a>
                                                    </div>
                                                    </td>
                                                                                               <!-- DELETE  PTA-->
                                               <div id="delete<?php echo $result['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content p-0 b-0">
                                                            <div class="panel panel-color panel-primary">
                                                                <div class="panel-heading">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="ion ion-close"></span></button>
                                                                    <h3 class="panel-title">Delete Selected User?</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                     <!-- Basic example -->
                                                                <div class="col-md-12">
                                                                    <form role="form" method="get" enctype="multipart/data" action="">
                                                                       <h3>Are you sure To delete this <b><?php echo strtoupper($result['fname'].' '.$result['mname'].' '.$result['lname']);?></b>?</h3>

                                                                       	<div class="modal-footer">
                                                                            <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">No</button>
                                                                            <a href="delete_user.php<?php echo '?id='.$result['id']; ?>" class="btn btn-danger">Yes</a>
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