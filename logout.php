<?php                                                                              
session_start();


if($_SESSION['admin']!=""){
    session_destroy();
    header('location:index');
}
else if($_SESSION['user']!=""){
    session_destroy();
    header('location:index');
}

?>