<?php 
    class Event{
        
       
        public function __construct(){
            try{
                 $this->handler = new PDO('mysql:host=127.0.0.1;dbname=mobi','root','');
            /*$this->handler = new PDO('mysql:host=localhost;dbname=asmiro_mobi','asmiro_mobi','liviu');*/
                $this->handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
        
        public function joinEvent($event_id,$user_id,$action){
            if($action==0){
                $sql="INSERT INTO join_event (event_id,user_id) VALUES (?,?)";
                $query=$this->handler->prepare($sql);
                $query->execute(array($event_id,$user_id));
                echo 'inserted';
            }else{
                $sql="DELETE FROM join_event WHERE event_id=? AND user_id=?;";
                $query=$this->handler->prepare($sql);
                $query->execute(array($event_id,$user_id));
                echo 'deleted';
            }
        }
        
        public function ifJoin($event_id,$user_id){
                $sql="select * from join_event where user_id=? AND event_id=?";
                $query=$this->handler->prepare($sql);
                $query->execute(array($user_id,$event_id));
                $result=$query->fetchAll(PDO::FETCH_ASSOC);
                    if(count($result)){
                        echo 'true';
                    }else{
                        echo 'false';
                    }
        }
        
        public function getFeedback($id){
            $sql="SELECT * FROM feedback WHERE event_id=?";
            $query=$this->handler->prepare($sql);
            $query->execute(array($id));
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
            echo json_encode($result);
        }
        
        public function getOrgEvents($id){
            $sql="SELECT e.event_id,e.enabled,e.project_name,e.businessOk,e.draft,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,
            (SELECT count(*) FROM feedback f WHERE f.event_id=e.event_id) as 'feedbackNr'
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.isDeleted=0 AND e.organizations_id=?  ORDER BY e.event_id desc";
         $query=$this->handler->prepare($sql);
            
         $query->execute(array($id));
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
        public function getAprovedFeedback($id){
             $sql="SELECT * FROM feedback WHERE event_id=? AND businessOk='1'";
            $query=$this->handler->prepare($sql);
            $query->execute(array($id));
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
            echo json_encode($result);
        }
        
        public function aprobaFeedback($id,$status){
            if($status==1){
                $sql="UPDATE feedback SET businessOk='1' WHERE id=?";
                $query=$this->handler->prepare($sql);
                $query->execute(array($id));
                echo 'success';
            }
            
            if($status==2){
                $sql="UPDATE feedback SET businessOk='2' WHERE id=?";
                $query=$this->handler->prepare($sql);
                $query->execute(array($id));
                echo 'success';
            }
        }
        public function insertFeedback($msg,$user,$event){
            if($user!=''){
                $sql="INSERT INTO feedback (message,name,date,event_id) VALUES (?,?,NOW(),?)";
                $query=$this->handler->prepare($sql);
                $query->execute(array($msg,$user,$event));
                echo 'success';
            }else{
                $sql="INSERT INTO feedback (message,date,event_id) VALUES (?,NOW(),?)";
                $query=$this->handler->prepare($sql);
                $query->execute(array($msg,$event));
                echo 'success';
            }
            
        }
        public function getEventStats(){
         $sql="SELECT 
         ev.categoryName, COUNT(*) as 'nr_ev' 
         FROM eventcategory ev, event e 
         WHERE ev.id=e.eventCategory 
         GROUP BY e.eventCategory";
            $query=$this->handler->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }
        public function deleteS($id){
        $sql="DELETE FROM program WHERE id=?";
        $query=$this->handler->prepare($sql);
            
         $query->execute(array($id));
        echo 'success';
        }
        public function getSchandule($id){
        $sql="SELECT * FROM program WHERE event_id=?";
         $query=$this->handler->prepare($sql);
            
         $query->execute(array($id));
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
        public function addToSchandule($data,$start,$end,$detalii,$event_id){
         $sql="INSERT INTO program (s_date,start_hour,end_hour,s_desc,event_id) VALUES (?,?,?,?,?)";
         $query=$this->handler->prepare($sql);
         $query->execute(array($data,$start,$end,$detalii,$event_id));
         
         echo 'added';
        }
        
        public function save($project_name,$start_date,$end_date,$location_x,$location_y,$location_name,$desc,$organization_id,$eventCategory,$FbPage,$address,$draft,$start_time,$end_time,$color,$id,$start_hours,$start_minutes,$end_hours,$end_minutes){
        
        $sql="UPDATE event 
        SET project_name=?,
        start_date=?,
        end_date=?,
        location_x=?,
        location_y=?,
        location_name=?,
        description=?,
        organizations_id=?,
        eventCategory=?,
        FbPage=?,
        address=?,
        draft=?,
        start_time=?,
        end_time=?,
        color=?,
        start_hour=?,
        start_minutes=?,
        end_hour=?,
        end_minutes=?,
        enabled=0,
        isDeleted=0
        WHERE event_id=?";
         
        $query=$this->handler->prepare($sql);
            
         $query->execute(array($project_name,$start_date,$end_date,$location_x,$location_y,$location_name,$desc,$organization_id,$eventCategory,$FbPage,$address,$draft,$start_time,$end_time,$color,$start_hours,$start_minutes,$end_hours,$end_minutes,$id));
         
         echo "updated";
        }
        
        public function insertEvent($eventName,$id,$org){
        if($org==''){
                $sql="INSERT INTO event (project_name,createdBy,createdAt) VALUES (?,?,NOW())";
                 $query=$this->handler->prepare($sql);

                 $query->execute(array($eventName,$id));

                 echo $this->handler->lastInsertId();
            }
            else{
                $sql="INSERT INTO event (project_name,createdBy,createdAt,organizations_id) VALUES (?,?,NOW(),?)";
                 $query=$this->handler->prepare($sql);

                 $query->execute(array($eventName,$id,$org));

                 echo $this->handler->lastInsertId();
            }
        }
        
    
        
        public function updateSchandule(){
        
        }
        
        public function getInfo($id){
        $sql="SELECT * FROM event e, organization o,user u WHERE e.event_id=? AND e.organizations_id=o.id AND e.CreatedBy=u.id";
         $query=$this->handler->prepare($sql);
            
         $query->execute(array($id));
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
        public function getCategories(){
         $sql="SELECT * FROM eventcategory";
         $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        
        }
        
        public function getAllEvents(){
            $sql="SELECT e.event_id,e.enabled,e.project_name,e.businessOk,e.draft,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.isDeleted,
	(SELECT count(*) FROM feedback f WHERE f.event_id=e.event_id) as 'feedbackNr'
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id ORDER BY e.event_id desc";
         $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        public function getPublishedEvents(){
         $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.description,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time, DATEDIFF(e.start_date,NOW()) AS DiffDate,(SELECT COUNT(*) FROM program p WHERE e.event_id=p.event_id) as ProgNR, e.location_x,e.location_y
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND
            e.end_date>= NOW()";
         $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
         public function search($event_name){
         $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.description,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time, DATEDIFF(e.start_date,NOW()) AS DiffDate,(SELECT COUNT(*) FROM program p WHERE e.event_id=p.event_id) as ProgNR, e.location_x,e.location_y
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND
            e.project_name LIKE '%".$event_name."%'";
         $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
        public function getFavorites($user_id){
            $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.description,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time, DATEDIFF(e.start_date,NOW()) AS DiffDate,(SELECT COUNT(*) FROM program p WHERE e.event_id=p.event_id) as ProgNR, e.location_x,e.location_y
            FROM event e, eventcategory c, organization o,user u, join_event j
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND j.event_id=e.event_id AND j.user_id=? AND
            e.end_date>= NOW()";
            $query=$this->handler->prepare($sql);
            
         $query->execute(array($user_id));
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);    
                
        }
        
        public function getEventsByCategory($id){
            $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.description,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time, DATEDIFF(e.start_date,NOW()) AS DiffDate,(SELECT COUNT(*) FROM program p WHERE e.event_id=p.event_id) as ProgNR, e.location_x,e.location_y
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND e.eventCategory=? AND
            e.end_date>= NOW()";
            $query=$this->handler->prepare($sql);
            
         $query->execute(array($id));
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);    
        }
        
         public function getEventsByDate($id){
             if($id=='1'){
                $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.description,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time, DATEDIFF(e.start_date,NOW()) AS DiffDate,(SELECT COUNT(*) FROM program p WHERE e.event_id=p.event_id) as ProgNR, e.location_x,e.location_y
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND e.start_date=NOW() AND
            e.end_date>= NOW()";
             }
             
             if($id=='2'){
                $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.description,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time, DATEDIFF(e.start_date,NOW()) AS DiffDate,(SELECT COUNT(*) FROM program p WHERE e.event_id=p.event_id) as ProgNR, e.location_x,e.location_y
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND DATEDIFF(e.start_date,NOW())<=7 AND DATEDIFF(e.start_date,NOW())>=0 AND
            e.end_date>= NOW()";
             }
             
             if($id=='3'){
                 $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.description,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time, DATEDIFF(e.start_date,NOW()) AS DiffDate,(SELECT COUNT(*) FROM program p WHERE e.event_id=p.event_id) as ProgNR, e.location_x,e.location_y
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND MONTH(e.start_date)=MONTH(now()) AND
            e.end_date>= NOW()";
             
             }
            
            $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);    
        }
        
        public function getEventsByOrg($org){
         $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.description,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time, DATEDIFF(e.start_date,NOW()) AS DiffDate,(SELECT COUNT(*) FROM program p WHERE e.event_id=p.event_id) as ProgNR, e.location_x,e.location_y
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND o.org_name=? AND
            e.end_date>= NOW()";
            
            $query=$this->handler->prepare($sql);
            
         $query->execute(array($org));
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);    
        }
         public function getPastEvents(){
         $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage,e.start_time,e.end_time
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=1 AND
            e.end_date< NOW()";
         $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
        
         public function getEventsForApprouvel(){
         $sql="SELECT e.event_id,e.project_name,e.start_date,e.end_date,e.location_name,e.address,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.FbPage
            FROM event e, eventcategory c, organization o,user u
            WHERE 
            e.eventCategory = c.id AND 
            e.organizations_id=o.id AND 
            e.CreatedBy=u.id AND e.draft=1 AND e.enabled=0";
         $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
        public function eventOk($id){
            $sql="UPDATE event SET enabled=1 WHERE event_id=?";
            $query=$this->handler->prepare($sql);
            
            $query->execute(array($id));
            echo 'Approuved';
        }
        
        public function eventReject($id){
            $sql="UPDATE event SET enabled=2,draft=0 WHERE event_id=?";
            $query=$this->handler->prepare($sql);
            
            $query->execute(array($id));
            echo 'Rejected';
        }
        
        public function orgDeleteEvent($id){
            $sql="UPDATE event SET enabled=2,draft=0,isDeleted=1 WHERE event_id=?";
            $query=$this->handler->prepare($sql);
            
            $query->execute(array($id));
            echo 'Deleted';
        }
        
         public function upload($file_size,$file_ext,$fname,$project_id,$file_tmp){
            
            
            
            $errors= array();
            $extensions = array("jpeg","jpg","png");        
            if(in_array($file_ext,$extensions)=== false){
             $errors[]="image extension not allowed, please choose a JPEG or PNG file.";
            }
            if($file_size > 2097152){
            $errors[]='File size cannot exceed 2 MB';
            }               
            if(empty($errors)==true){
                if (!file_exists('images')) {
                    mkdir('images', 0777, true);
                }
                
                move_uploaded_file($file_tmp,"images/".$project_id.".png");
                $file = "images/".$project_id.".png";
                $resizedFile = "images/".$project_id."_r.png";
                $this->smart_resize_image(null , file_get_contents($file), 851 , 315 , false , $resizedFile , false , false ,100, false);
                echo "UPLOADED";
            }else{
                print_r($errors);
            }
        
        }
        
        public function smart_resize_image($file,
                              $string             = null,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false,
  							  $quality = 100
  		 ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;
    if ( $file === null && $string === null ) return false;
 
    # Setting defaults and meta
    $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
	$cropHeight = $cropWidth = 0;
 
    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );
 
      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
	  $widthX = $width_old / $width;
	  $heightX = $height_old / $height;
	  
	  $x = min($widthX, $heightX);
	  $cropWidth = ($width_old - $width * $x) / 2;
	  $cropHeight = ($height_old - $height * $x) / 2;
    }
 
    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);
 
      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
	
	
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }
 
    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default: return false;
    }
 
    return true;
  }
        
        
    }
?>