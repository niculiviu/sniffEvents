<?php 
include 'classes/event.php';
$event=new Event();

$program=json_decode(file_get_contents('php://input')); 

$data=$program->data;
$start=$program->start;
$end=$program->end;
$detalii=$program->detalii;
$event_id=$program->event_id;

$event->addToSchandule($data,$start,$end,$detalii,$event_id);

?>