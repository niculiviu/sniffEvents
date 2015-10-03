<?php 
include 'classes/organization.php';
$org=new Organization();

$org_data=json_decode(file_get_contents('php://input')); 

$orgName=$org_data->name;
$orgType=$org_data->type;
$by=$org_data->by;

$org->addOrg($orgName,$orgType,$by);

?>