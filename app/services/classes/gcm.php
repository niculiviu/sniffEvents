<?php
 
class GCM {
 
    //put your code here
    // constructor
    function __construct() {
         require_once 'config.php';
         try{
                 $this->handler = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
                 $this->handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo $e->getMessage();
                die();
            }
    }
 
    /**
     * Sending Push Notification
     */
    public function send_notification($registatoin_ids, $message,$title,$ev_id) {
        // include config
        include_once 'config.php';
        
                $sql="INSERT INTO messages (message,project_id,addedOn) VALUES (?,?,NOW())";
                $query=$this->handler->prepare($sql);
                $query->execute(array($message,$ev_id));
 
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => array("text" => $message,"title"=>$title),
        );
 
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        echo $result;
    }
 
}
 
?>