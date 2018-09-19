
<?php
require_once('../config/db_connect.php');
$get_id=$_REQUEST['id'];

    $delete=$conn->query("DELETE FROM users WHERE id='$get_id' ");
    if($delete){
        echo "<div class = 'alert alert-success message'>User Deleted Successfully</div>";
     header('location:view_users');

    }

?>
