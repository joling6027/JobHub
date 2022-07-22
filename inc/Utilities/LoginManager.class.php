<?php

class LoginManager  {

    static function verifyLogin()   {

        if(session_id() == '' || !isset($_SESSION)){
            session_start();
        }
  
        if(isset($_SESSION['username'])){
            return true;
        }else{
            session_destroy();
            return false;
        }
    }

    static function verifyPassword(string $passwordToVerify, $hash) {
        return password_verify($passwordToVerify, $hash);
    }
    
}

?>