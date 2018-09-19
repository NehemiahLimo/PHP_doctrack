<?php
session_start();
require_once('config/db_connect.php');

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/single-logo.png">

        <title>MMUST DocTrack | Password Manage</title>

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
        <link rel="stylesheet" href="resources/assets/morris/morris.css">


        <!-- Custom styles for this template -->
        <link href="resources/css/style.css" rel="stylesheet">
        <link href="resources/css/helper.css" rel="stylesheet">
        <link href="resources/css/style-responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

     <style>
   .error{
       color: red;
   }

   </style>
    </head>


    <body>
         <div class="wraper container-fluid">
        <div class="wrapper-page animated fadeInDown">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                   <h3 class="text-center m-t-10"> Forgot Password <strong>DocTrack</strong> </h3>
                </div>
                      <?php
if(isset($_POST['btn-login'])){
    $pf=trim($_POST['pfnumber']);
     $query=$conn->query("SELECT * FROM users WHERE pfnumber='$pf'");
     $row=$query->fetch_array();
     $count=$query->num_rows;
     if($count==1){
        echo "<div class='alert alert-success'> <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Yor password is: ".$row['password']."</div>";
     }

        else {
         echo "<div class='alert alert-danger' id='#error'> <span class='glyphicon glyphicon-info-sign'></span> &nbsp; The PF Number does not exist!</div>";
         }
    }


?>
                <div id="error"></div>
                <form class="form-horizontal m-t-40" method="post" action="">

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="pfnumber" required="required" placeholder="PF Number">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="col-xs-12">
                            <button class="btn btn-purple w-md" name="btn-login" type="submit">Get Password</button>
                        </div>
                    </div>
                     <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="index"><i class="fa fa-lock m-r-5"></i> Back to Login?</a>
                        </div>

                    </div>
                </form>

            </div>
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
</html>
