<?php
    class User {
        // static method that checks if a username is available (table users, column username)
        public static function isUsernameAvailable($username){
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from users where username = :username");
            $statement->bindValue(":username", $username);
            $statement->execute();
            // if 1 record is found, the username is not available. Count records in code
            if($statement->rowCount() == 0){
                return true;
            } else {
                return false;
            }
        }
    }