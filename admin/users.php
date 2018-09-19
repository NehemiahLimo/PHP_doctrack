<?php require_once('../inc/header.php');?>
<?php require_once('../inc/sidebar.php');?>


<?php


?>
 <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">Register a User</h3>
                </div>
                <div class="row">
                     <div class="col-lg-12">
                        <div class="portlet">
                            <div class="portlet-heading bg-info">
                                <h3 class="portlet-title">
                                    User Registration
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
                                <!-- Add new USER -->
                                    <?php //require_once('../inc/functions.php');
                                    if(isset($_POST['register'])){

                                        $fname=$_POST['fname'];
                                        $mname=$_POST['mname'];
                                        $lname=$_POST['lname'];
                                        $pf=$_POST['pfnumber'];
                                        $position=$_POST['position'];
                                        $role=$_POST['category'];
                                        $status=6;
                                        $password="user123";


                                        $query=$conn->query("INSERT INTO users (fname,lname,mname,pfnumber,position_id,role,password,date,status_id) VALUES('$fname','$lname','$mname','$pf','$position','$role','$password',NOW(),'$status')") ;

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
                                    <form role="form" method="post" enctype="multipart/form-data" id="register_doc">
                                      <div class="row">
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fname">First Name </label>
                                                <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mname">Middle Name </label>
                                                <input type="text" name="mname" class="form-control" id="mname" placeholder="Middle Name">
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lname">Last Name </label>
                                                <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
                                            </div>
                                          </div>
                                      </div>
                                          <div class="row">
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pfnumber">PF Number </label>
                                                <input type="text" name="pfnumber" class="form-control" id="pfnumber" placeholder="Enter PF number">
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="position">Position </label>
                                                  <select class="form-control "  name="position">
                                                    <option>Select position</option>
                                                    <?php
                                                    $query=$conn->query("SELECT * FROM position");
                                                    while($p=mysqli_fetch_assoc($query)){
                                                        ?>
                                                        <option value="<?php echo $p['position_id'];?>"><?php echo $p['position_name'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                          </div>
                                           <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="User">User Category </label>
                                                  <select class="form-control "  name="category">
                                                    <option>Select Category</option>
                                                    <?php
                                                    $query=$conn->query("SELECT * FROM roles");
                                                    while($s=mysqli_fetch_assoc($query)){
                                                        ?>
                                                        <option value="<?php echo $s['role_id'];?>"><?php echo $s['role_name'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                          </div>
                                      </div>
                                            <button type="submit" name="register" class="btn btn-purple">Register</button>
                                  </form>
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