<?php 
    class Event{
        
       
        public function __construct(){
            try{
                /* $this->handler = new PDO('mysql:host=127.0.0.1;dbname=mobi','root','');*/
            $this->handler = new PDO('mysql:host=localhost;dbname=asmiro_mobi','asmiro_mobi','liviu');
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
            $sql="SELECT e.event_id,e.enabled,e.project_name,e.businessOk,e.draft,o.org_name,u.first_name,u.last_name, c.categoryName,e.color
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
            $sql="SELECT e.event_id,e.enabled,e.project_name,e.businessOk,e.draft,o.org_name,u.first_name,u.last_name, c.categoryName,e.color,e.isDeleted
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
        
        
    }
?>