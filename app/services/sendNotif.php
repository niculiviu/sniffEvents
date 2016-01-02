<?php 
include 'classes/gcm.php';
$GCM=new GCM();
$user_data=json_decode(file_get_contents('php://input'));
$message=$user_data->message;
$gcm_id=$user_data->gcm_regid;
$ev=$user_data->event->project_name;
$ev_id=$user_data->event->event_id;


$GCM->send_notification($gcm_id,$message,$ev,$ev_id);

?>