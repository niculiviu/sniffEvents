<?php 
include 'classes/user.php';
$user=new User();

$user_data=json_decode(file_get_contents('php://input'));

$firstName=$user_data->nume;
$lastName=$user_data->prenume;
$email=$user_data->email;
$pass=$user_data->pass1;
$rol=4;
$org=$user_data->org;


$user->adaugaU($firstName,$lastName,$email,$pass,$rol,$org);



?>