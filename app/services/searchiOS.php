<?php 
include 'classes/event.php';
$event=new Event();

$feedback_data=json_decode(file_get_contents('php://input')); 

$event_name=$feedback_data->$event_name;
$event->search($event_name);

?>