<?php 
include 'classes/event.php';
$event=new Event();

$user_id=urldecode($_POST['user_id']);
$event_id=urldecode($_POST['event_id']);

$event->ifJoin($event_id,$user_id);

?>