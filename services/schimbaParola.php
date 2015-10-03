<?php 
include 'classes/user.php';
$user=new User();

$user_data=json_decode(file_get_contents('php://input'));

$id=$user_data->id;
$old=$user_data->old;
$pass=$user_data->pass1;

$user->schimbaParola($id,$old,$pass);

?>