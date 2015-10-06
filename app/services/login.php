<?php
    include 'classes/user.php';
    $user=new User();

    $user_data=json_decode(file_get_contents('php://input'));
    $username=$user_data->email;
    $password=$user_data->pass;

    if($username!=''||$password!=''){
        if($user->login($username,$password)){
            
        }
    }
?>