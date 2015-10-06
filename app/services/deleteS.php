<?php 
include 'classes/event.php';
$event=new Event();

$event_data=json_decode(file_get_contents('php://input')); 

$id=$event_data->id;

$event->deleteS($id);
?>