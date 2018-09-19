<?php require_once('../inc/header_user.php');?>
<?php require_once('../inc/sidebar_user.php');?>
<?php //require_once('../inc/functions.php');?>
<?php
$doc=@$_GET['doc_id'];

?>

 <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">My Documents</h3>
                </div>

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
                                    <?php
                                    if(isset($_POST['send_document'])){
                                        $document=$doc;
                                        $receiver=$_POST['receiver'];
                                        $message=$_POST['message'];
                                        $sender=$_SESSION['user'];
                                        $status=1;
                                        $query1=$conn->query("INSERT INTO sent_documents (doc_id, sender,receiver,message, date_received,status_id) VALUES('$document','$sender','$receiver','$message',NOW(),'$status')");
                                        //$query2=$conn->query("INSERT INTO doc_tracking (doc_id,sender, status_id,date_track) VALUES('$document','$sender','$status',NOW())");
                                        if($query1){
                                            echo "<div class='alert alert-success' > <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Document sent Successfully!<button class='close' data-dismiss='alert' >&times;</button></div>";
                                        }
                                        else{
                                            echo "<div class='alert alert-danger'> <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error in Sending!</div>".mysqli_error($conn);
                                        }

                                    }
                                    ?>
                                    <form role="form" method="post" enctype="multipart/form-data" id="register_doc">
                                           <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Receiver">Staff To Receive Document:  </label>
                                                    <select type="text" name="receiver" class="form-control" id="title">
                                                        <option disabled="disabled">Select Staff</option>
                                                        <?php
                                                        $query=$conn->query("SELECT * FROM users WHERE pfnumber !='$_SESSION[user]'");
                                                        while($send=mysqli_fetch_assoc($query)){
                                                            ?>
                                                            <option value="<?php echo $send['pfnumber'];?>"><?php echo $send['fname']." ".$send['lname'];?></option>
                                                            <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="Message">Message</label>
                                                   <textarea name="message" class="form-control" id="" cols="15" rows="5"></textarea>
                                                </div>
                                              </div>
                                            </div>


                                            <button type="submit" name="send_document" class="btn btn-purple">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->


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
            <?php require_once('../inc/footer_user.php');?>