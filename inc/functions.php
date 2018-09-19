

<?php
/* SYSTEM FUNCTIONS */

/* register a document  */
if(isset($_POST['register_document'])){
    move_uploaded_file($_FILES['document']['tmp_name'],"../resources/documents/".$_FILES['document']['name']);
    $title=$_POST['title'];
    $document=$_FILES['document']['name'];

    $query=$conn->query("INSERT INTO registered_documents (title,document_by,document_name,date_registered) VALUES ('$title','$_SESSION[admin]','$document',NOW())") ;
    
}

?>
