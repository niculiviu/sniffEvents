<?php 
    
    class User{
        
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
       
        public function schimbaParola($id,$old,$pass){
            
            $sql="SELECT pass FROM user WHERE id=?";
            $query=$this->handler->prepare($sql);
            $query->execute(array($id));
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            if($result[0]['pass']==$old){
                $sql="UPDATE user SET pass=? WHERE id=?";
                $query=$this->handler->prepare($sql);
                $query->execute(array($pass,$id));
                echo 'success';
            }else{
                echo 'parola_veche';
            }
        
        }
        public function register($first,$last,$email,$pass,$rol){
            
            
            $sql="INSERT INTO user (first_name,last_name,email,pass,createdAt,rol) VALUES (?,?,?,?,NOW(),?)";
            $query=$this->handler->prepare($sql);
            
            $query->execute(array($first,$last,$email,$pass,$rol));
            
            echo "User INSERTED";
        }
        
        public function registerMobile($first,$last,$email,$pass){
            $sql="INSERT INTO user (first_name,last_name,email,pass,createdAt,rol) VALUES (?,?,?,?,NOW(),'2')";
            $query=$this->handler->prepare($sql);
            
            $query->execute(array($first,$last,$email,$pass));
            
            echo "mobile_user_success";
        }
        
        public function login($username,$pass){
            
            try{
                
                $sql="SELECT * FROM user WHERE email=?";
                $query=$this->handler->prepare($sql);
                $query->execute(array($username));
                
                $result=$query->fetchAll(PDO::FETCH_ASSOC);
                
                if(count($result)){
                    if($result[0]['pass']==$pass){
                        session_start();
                        $_SESSION["id"] = $result[0]['id'];
                        $_SESSION["first_name"] = $result[0]['first_name'];
                        $_SESSION["last_name"] = $result[0]['last_name'];
                        $_SESSION["rol"]=$result[0]['rol'];
                        $_SESSION["org"]=$result[0]['organization_id'];
                        $_SESSION["email"]=$result[0]['email'];
                        echo json_encode($_SESSION);
                    }else{
                        echo 'no_pass';
                    }
                }else{
                    echo 'no_user';
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
        
     public function getAllUsers(){
        
         $sql="SELECT * FROM user u, roles r WHERE r.id=u.rol";
         $query=$this->handler->prepare($sql);
         $query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         echo json_encode($result);
     }
    public function updateUserProfile($user_first,$user_last,$email,$id){
        $sql="UPDATE user SET first_name=?,last_name=?,email=? WHERE id=?";
         $query=$this->handler->prepare($sql);
         $query->execute(array($user_first,$user_last,$email,$id));
         session_start();
        $_SESSION["first_name"] =$user_first;
        $_SESSION["last_name"] = $user_last;
        $_SESSION["email"]=$email;
        echo 'success';
    }
        
    public function verify($email){
         $sql="SELECT u.id,u.first_name,u.last_name,u.email,u.rol FROM user u, roles r WHERE r.id=u.rol AND u.email=?";
         $query=$this->handler->prepare($sql);
         $query->execute(array($email));
        
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
        
         if(count($result)){
            echo json_encode($result);
         }else{
            echo 'userul_nu_exista';
         }
    }
        
    public function getLogged(){
        session_start();
        echo json_encode($_SESSION);
    }
    
    public function logout(){
        session_start();
        session_destroy();
        echo 'success';
    }
        
    public function adaugaRol($user,$org){
       $sql="UPDATE user SET rol='4',organization_id=? WHERE id=?";
       $query=$this->handler->prepare($sql);
       $query->execute(array($org,$user));
        echo 'success';
    }
        public function eliminaRol($user){
        $sql="UPDATE user SET rol='2',organization_id='-1' WHERE id=?";
       $query=$this->handler->prepare($sql);
       $query->execute(array($user));
        echo 'success';
        }
        
    public function adaugaU($firstName,$lastName,$email,$pass,$rol,$org){
        $sql="INSERT INTO user (first_name,last_name,email,pass,createdAt,rol,organization_id) VALUES (?,?,?,?,NOW(),?,?)";
          $query=$this->handler->prepare($sql);
       $query->execute(array($firstName,$lastName,$email,$pass,$rol,$org));
        echo $this->handler->lastInsertId();;
    }
        
    public function getRoles(){
         
         
         $sql="SELECT * FROM roles";
         $query=$this->handler->prepare($sql);
         $query->execute();
         
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($result);
        
    }
            
    }
?>