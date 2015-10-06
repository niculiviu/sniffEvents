<?php 
include 'classes/event.php';
$event=new Event();

$feedback_data=json_decode(file_get_contents('php://input')); 

$id=$feedback_data->id;
$status=$feedback_data->status;

$event->aprobaFeedback($id,$status);
?>