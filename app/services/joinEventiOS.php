<?php 
include 'classes/event.php';
$event=new Event();
$feedback_data=json_decode(file_get_contents('php://input')); 

$user_id=$feedback_data->user_id;
$event_id=$feedback_data->event_id;
$action=$feedback_data->event_idaction;

$event->joinEvent($event_id,$user_id,$action);

?>