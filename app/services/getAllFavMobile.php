
<?php 
include 'classes/event.php';
$event=new Event();
$user_data=json_decode(file_get_contents('php://input'));
$id=$user_data->event;


$event->getAllFavMobile($id);

?>