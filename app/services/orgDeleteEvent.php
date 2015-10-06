<?php 
include 'classes/event.php';
$event=new Event();

$org_data=json_decode(file_get_contents('php://input')); 

$id=$org_data->id;


$event->orgDeleteEvent($id);
?>