<?php require_once('config/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<!-- Copied from http://coderthemes.com/velonic_wb_3/admin/register.html by Cyotek WebCopy 1.3.0.405, Friday, February 2, 2018, 10:30:35 AM -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>MMUST DocTrack | Register</title>

        <!-- Google-Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,600,700,900,400italic' rel='stylesheet'>


        <!-- Bootstrap core CSS -->
        <link href="resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="resources/css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="resources/css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="resources/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="resources/assets/ionicon/css/ionicons.min.css" rel="stylesheet">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">


        <!-- Custom styles for this template -->
        <link href="resources/css/style.css" rel="stylesheet">
        <link href="resources/css/helper.css" rel="stylesheet">
        <link href="resources/css/style-responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->


    </head>


    <body>

        <div class="wrapper-page animated fadeInDown">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                   <h3 class="text-center m-t-10"> Create a new Account </h3>
                </div>
                 <?php
                 if(isset($_POST['register'])){
                     $fname=$_POST['fname'];
                     $lname=$_POST['lname'];
                     $mname=$_POST['mname'];
                     $pf=$_POST['pfnumber'];
                     $position=$_POST['position'];
                     $password=$_POST['password'];
                      $role=1;
                     $query=$conn->query("INSERT INTO users (fname,lname,mname,pfnumber,position_id,role,password,date) VALUES('$fname','$lname','$mname','$pf','$position','$role','$password',NOW())");
                     if($query){
                         echo "<div class='alert alert-success'>Registration Successful.<button class='close' data-dismiss='alert' >&times;</button></div>";

                     }
                     else{
                        echo "<div class='alert alert-danger'>Error!!".mysqli_error($conn)."<button class='close' data-dismiss='alert' >&times;</button></div>";
                     }
                 }

                 ?>
                <form class="form-horizontal m-t-40" method="post">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name= "fname" placeholder="First Name">
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control " type="text" required="" name="lname" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control " type="text" name="mname"  placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control " type="text" name="pfnumber"  placeholder="PfNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
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
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control " type="password" name="password"  placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label class="cr-styled">
                                <input type="checkbox" checked="">
                                <i class="fa"></i> 
                                 I accept <strong><a href="#">Terms and Conditions</a></strong>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group text-right">
                        <div class="col-xs-12">
                            <button class="btn btn-purple w-md" type="submit" name="register">Register</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-12 text-center">
                            <a href="index">Already have account?</a>
                        </div>
                    </div>
                </form>                                  
                
            </div>
        </div>

        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="resources/js/jquery.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/pace.min.js"></script>
        <script src="resources/js/wow.min.js"></script>
        <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>
            
        <!--common script for all pages-->
        <script src="resources/js/jquery.app.js"></script>

    
    </body>
<!-- Copied from http://coderthemes.com/velonic_wb_3/admin/register.html by Cyotek WebCopy 1.3.0.405, Friday, February 2, 2018, 10:30:35 AM -->
</html>
