<?php 
include 'classes/event.php';
$event=new Event();

$event_name=urldecode($_POST['event_name']);
//$event_name='a';

$event->search($event_name);

?>