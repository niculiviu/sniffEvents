<?php 
include 'classes/user.php';
$user=new User();

$user_data=json_decode(file_get_contents('php://input'));

$email=$user_data->email;

$user->verify($email);

?>