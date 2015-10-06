<?php 
include 'classes/user.php';
$user=new User();

$user_data=json_decode(file_get_contents('php://input'));

$user_id=$user_data->user_id;

$user->eliminaRol($user_id);

?>