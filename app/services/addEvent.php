<?php 
include 'classes/event.php';
$event=new Event();

$event_data=json_decode(file_get_contents('php://input')); 

$eventName=$event_data->event_name;
$id=$event_data->user;
$org=$event_data->org;

$event->insertEvent($eventName,$id,$org);

?>