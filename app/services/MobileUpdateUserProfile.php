<?php 
include 'classes/user.php';
$user=new User();

$user_first=urldecode($_POST['first_name']);
$user_last=urldecode($_POST['last_name']);
$email=urldecode($_POST['email']);
$id=urldecode($_POST['id']);

$user->updateUserProfile($user_first,$user_last,$email,$id);

?>