<?php 
include 'classes/event.php';
$event=new Event();

$feedback_data=json_decode(file_get_contents('php://input')); 

$msg=$feedback_data->msg;
$user=$feedback_data->user;
$event_id=$feedback_data->event;


$event->insertFeedback($msg,$user,$event_id);

?>