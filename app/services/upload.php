<?php
include 'classes/event.php';
$u=new Event();

$fname = $_POST["fname"];
if(isset($_FILES['file'])){
    //The error validation could be done on the javascript client side.
    $file_name = $_FILES['file']['name'];
    $file_size =$_FILES['file']['size'];
    $file_tmp =$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];   
    $project_id=$_POST['project_id'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    $u->upload($file_size,$file_ext,$fname,$project_id,$file_tmp);
    
}
?>