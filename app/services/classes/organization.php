<?php 
    class Organization{
        
       
        public function __construct(){
            try{
               /*$this->handler = new PDO('mysql:host=127.0.0.1;dbname=mobi','root','');*/
               $this->handler = new PDO('mysql:host=localhost;dbname=asmiro_mobi','asmiro_mobi','liviu');
                $this->handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
        
        public function getOrgUsers($id){
            $sql="SELECT * FROM user u WHERE u.organization_id=?";
         $query=$this->handler->prepare($sql);
         $query->execute(array($id));
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         echo json_encode($result);
        }
        
        public function addOrgAndUser($orgName,$nume,$prenume,$email,$pass){
            $sql="INSERT INTO organization (org_name,orgType) VALUES (?,'1')";
            $query=$this->handler->prepare($sql); 
            $query->execute(array($orgName));
            $org_id=$this->handler->lastInsertId();
            
            $sql="SELECT * FROM user WHERE email=?";
            $query=$this->handler->prepare($sql); 
            $query->execute(array($email));
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            
            if(!count($result)) {
              $sql="INSERT INTO user (first_name,last_name,email,createdAt,pass,organization_id,rol)VALUES(?,?,?,NOW(),?,?,4)";
              $query=$this->handler->prepare($sql); 
              $query->execute(array($nume,$prenume,$email,$pass,$org_id));
              
               
              $user_id=$this->handler->lastInsertId();
              $sql="UPDATE organization SET createdBy=?,createdAt=NOW() where id=?";
              $query=$this->handler->prepare($sql); 
              $query->execute(array($user_id,$org_id));
            
            
              echo 'success';
            }else{
              echo 'error';
              }
            
            
           
        }
        
        public function checkOrg($orgName){
         $sql="SELECT COUNT(*) as 'nr' FROM organization WHERE org_name=?";
         $query=$this->handler->prepare($sql); 
         $query->execute(array($orgName));
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }
        
        public function getOrgStats(){
            $sql="SELECT o.org_name, COUNT(*) as 'nr_evenimente' FROM organization o, event e WHERE o.id=e.organizations_id GROUP BY e.organizations_id";
            $query=$this->handler->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }
        public function getOrgs(){
         
         $sql="SELECT o.id,o.org_name,o.createdAt,t.type,u.first_name,u.last_name 
         FROM organization o, orgtype t, user u 
         WHERE o.orgType=t.id AND o.createdBy=u.id";
         $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
        public function addOrg($orgName,$orgType,$by){
             $sql="INSERT INTO organization (org_name,orgType,createdBy,createdAt) VALUES (?,?,?,NOW())";
         $query=$this->handler->prepare($sql);
            
         $query->execute(array($orgName,$orgType,$by));
         
         echo $this->handler->lastInsertId();
        }
        
        public function getTypes(){
         
         $sql="SELECT * FROM orgtype";
         $query=$this->handler->prepare($sql);
            
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        }
        
        public function editOrg(){
        
        }
        
        public function removeOrg(){
        
        }
    }
?>