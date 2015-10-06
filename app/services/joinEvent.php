<?php 
include 'classes/event.php';
$event=new Event();

$user_id=urldecode($_POST['user_id']);
$event_id=urldecode($_POST['event_id']);
$action=urldecode($_POST['action']);

$event->joinEvent($event_id,$user_id,$action);

?>