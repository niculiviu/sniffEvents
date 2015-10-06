<?php 
include 'classes/user.php';
$user=new User();

$user_data=json_decode(file_get_contents('php://input'));

$user_id=$user_data->user_id;
$org=$user_data->org_id;

$user->adaugaRol($user_id,$org);

?>