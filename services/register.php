<?php 
include 'classes/user.php';
$user=new User();

$user_data=json_decode(file_get_contents('php://input'));

$firstName=$user_data->firstName;
$lastName=$user_data->lastName;
$email=$user_data->email;
$pass=$user_data->pass;
$rol=$user_data->role->id;

if($firstName!=''||$lastName!=''||$email!=''||$pass!=''){
    $user->register($firstName,$lastName,$email,$pass,$rol);
}


?>