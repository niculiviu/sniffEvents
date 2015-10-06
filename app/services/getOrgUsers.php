<?php 
include 'classes/organization.php';
$org=new Organization();

$data=json_decode(file_get_contents('php://input')); 

$id=$data->id;


$org->getOrgUsers($id);

?>