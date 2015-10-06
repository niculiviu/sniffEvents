<?php 
include 'classes/user.php';
$user=new User();



$firstName=urldecode($_POST['nume']);
$lastName=urldecode($_POST['prenume']);
$email=urldecode($_POST['email']);
$pass=urldecode($_POST['pass']);
$user->registerMobile($firstName,$lastName,$email,$pass);



?>