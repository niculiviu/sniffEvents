<?php 
include 'classes/event.php';
$event=new Event();

$feedback_data=json_decode(file_get_contents('php://input')); 

$id=$feedback_data->id;


$event->getFavorites($id);

?>