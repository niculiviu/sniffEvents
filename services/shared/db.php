<?php
    try{
        $handler = new PDO('mysql:host=127.0.0.1;dbname=asmiro_mobi','asmiro_liviu','liviurullez');
        $handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
        die();
    }