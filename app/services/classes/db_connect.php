<?php
  
class DB_Connect {
    
    protected $handler;
  
    // constructor
    function __construct() {
  
    }
  
    // destructor
    function __destruct() {
        // $this->close();
    }
  
    // Connecting to database
    public function connect() {
        
        
        
        // connecting to mysql
        //$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        // selecting database
        //mysql_select_db(DB_DATABASE);
  
        // return database handler
        return  $this->handler;
    }
  
    // Closing database connection
    public function close() {
        mysql_close();
    }
    
    
  
} 
?>