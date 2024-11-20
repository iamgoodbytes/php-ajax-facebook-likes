<?php
    require_once("../bootstrap.php");
    if( !empty($_POST) ) {
        $username = $_POST['username']; 

        $result = User::isUsernameAvailable($username);
        if($result === true){
            $available = true;
        }
        else{
            $available = false;
        }

        $result = [
            "status" => "success",
            "message" => "Username was checked",
            "available" => $available
        ];

        echo json_encode($result);

    }