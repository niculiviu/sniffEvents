
<?php 

include 'classes/event.php';
$event=new Event();

$event_data=json_decode(file_get_contents('php://input'));

$project_name=$event_data->project_name;
$start_date=$event_data->start_date;
$end_date=$event_data->end_date;
$location_x=$event_data->location_x;
$location_y=$event_data->location_y;
$location_name=$event_data->location_name;
$desc=$event_data->description;
$organization_id=$event_data->org->id;
$eventCategory=$event_data->cat->id;
$FbPage=$event_data->FbPage;
$address=$event_data->address;
$draft=$event_data->draft;
$start_time=$event_data->start_time;
$end_time=$event_data->end_time;
$color=$event_data->color;
$id=$event_data->event_id;
$start_hours=$event_data->start_hour;
$start_minutes=$event_data->start_minutes;
$end_hours=$event_data->end_hour;
$end_minutes=$event_data->end_minutes;

$event->save($project_name,$start_date,$end_date,$location_x,$location_y,$location_name,$desc,$organization_id,$eventCategory,$FbPage,$address,$draft,$start_time,$end_time,$color,$id,$start_hours,$start_minutes,$end_hours,$end_minutes);

?>