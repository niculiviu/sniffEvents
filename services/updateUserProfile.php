<?php 
include 'classes/user.php';
$user=new User();

$user_data=json_decode(file_get_contents('php://input'));

$user_first=$user_data->first_name;
$user_last=$user_data->last_name;
$email=$user_data->email;
$id=$user_data->id;

$user->updateUserProfile($user_first,$user_last,$email,$id);

?>