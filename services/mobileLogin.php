<?php
    include 'classes/user.php';
    $user=new User();

    $username=urldecode($_POST['email']);
    $password=urldecode($_POST['pass']);
    $user->login($username,$password);
                 
    
?>