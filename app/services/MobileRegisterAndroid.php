<?php 
include 'classes/user.php';
$user=new User();



$firstName=urldecode($_POST['nume']);
$lastName=urldecode($_POST['prenume']);
$email=urldecode($_POST['email']);
$pass=urldecode($_POST['pass']);
$gcm_id=urldecode($_POST['gcm_id']);
$user->registerMobileAndroid($firstName,$lastName,$email,$pass,$gcm_id);



?>