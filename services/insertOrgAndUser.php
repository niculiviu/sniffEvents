<?php 
include 'classes/organization.php';
$org=new Organization();

$org_data=json_decode(file_get_contents('php://input')); 

$orgName=$org_data->org;
$nume=$org_data->nume;
$prenume=$org_data->prenume;
$email=$org_data->email;
$pass=$org_data->pass1;

$org->addOrgAndUser($orgName,$nume,$prenume,$email,$pass);

?>