<?php 
include 'classes/event.php';
$event=new Event();

$id=urldecode($_POST['id']);

$event->getAllMessages($id);

?>