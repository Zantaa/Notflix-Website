<?php

function login($username, $password){
    global  $database;
    $query = 'SELECT username, password_hash FROM user '
            . 'where username = :username';
            
            
            $statement = $database->prepare($query);
            
            
            $statement->bindValue (":username", $username);
            
            
            $statement->execute();
            
            
            $user = $statement->fetch();
            
            $statement->closeCursor();
            
            if ($user == null){
                return false;
            }
            
            $password_hash = $user['password_hash'];
            
            return password_verify($password, $password_hash);        
}


