<?php
session_start();
require_once('../config/db_connect.php');
$role=$_SESSION['role_session'];
if(!isset($_SESSION['user'])&& $role!=1){
    echo"<script>window.location.href='../index'</script>";
}
else{
    $session_id=$_SESSION['user'] ;
    $query=$conn->query("SELECT * FROM users WHERE pfnumber='$session_id'");
    $row=$query->fetch_array();
    $count=$query->num_rows;
    $fname=$row['fname'];
    $lname=$row['lname'];
    $pf=$row['pfnumber'];
    $fullname=$fname.' '.$lname;

}

?>

<!DOCTYPE html>
<html lang="en">
<!-- Copied from http://coderthemes.com/velonic_wb_3/admin/index.html by Cyotek WebCopy 1.3.0.405, Friday, February 2, 2018, 10:30:35 AM -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="../resources/img/logo.png">

        <title>MMUST DocTrack|Dashboard</title>

        <!-- Google-Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,600,700,900,400italic' rel='stylesheet'>

        <!-- Bootstrap core CSS -->
        <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="../resources/css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="../resources/css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="../resources/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="../resources/assets/ionicon/css/ionicons.min.css" rel="stylesheet">

        <!--Morris Chart CSS -->
        <link rel="../resources/stylesheet" href="assets/morris/morris.css">

        <!-- DataTables -->
        <link href="..resources/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

        <!-- sweet alerts -->
        <link href="../resources/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../resources/css/style.css" rel="stylesheet">
        <link href="../resources/css/helper.css" rel="stylesheet">
        <link href="../resources/css/style-responsive.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->



    </head>

