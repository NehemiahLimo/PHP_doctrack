
<?php
require_once('../config/db_connect.php');
$get_id=$_REQUEST['id'];

    $delete=$conn->query("DELETE FROM registered_documents WHERE id='$get_id' ");
    if($delete){
     header('location:documents');
    }

?>
