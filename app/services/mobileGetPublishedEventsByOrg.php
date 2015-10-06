

<?php 
include 'classes/event.php';
$event=new Event();

$org=urldecode($_POST['org']);


$event->getEventsByOrg($org);

?>