<?php 
include 'classes/organization.php';
$org=new Organization();

$org_data=json_decode(file_get_contents('php://input')); 

$orgName=$org_data->org;


$org->checkOrg($orgName);

?>