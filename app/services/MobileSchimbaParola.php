<?php 
include 'classes/user.php';
$user=new User();

$id=urldecode($_POST['id']);
$old=urldecode($_POST['old']);
$pass=urldecode($_POST['new']);

$user->schimbaParola($id,$old,$pass);

?>