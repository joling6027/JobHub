<?php

require_once('../inc/config.inc.php');
require_once('../inc/Utilities/PDOService.php');
require_once('../inc/Utilities/UsersDAO.class.php');
require_once('../models/Users.class.php');
require_once('../inc/Utilities/LoginManager.class.php');

if(LoginManager::verifyLogin())
{
    UsersDAO::initialize(USERS);

    if(!empty($_POST))
    {
        $existingUser = UsersDAO::getUser($_SESSION['username']['Email']);
        if (!empty($existingUser)) 
        {
            $password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
            $response = UsersDAO::updatePassword($_SESSION['username']['Email'], $password);
            if($response > 0)
            {
                $_SESSION['msg']['success']  = "Password is changed sucessfully.";
            }
            else{
                $_SESSION['msg']['success']  = "Password not changed.";
            }
            $_SESSION['msg']['url'] = LOCATION_LOGIN;
            header("Location: ".LOCATION_LOGIN);
            exit;
        }
    }
}
else{
    header("Location: ".LOCATION_LOGIN);
    exit;
}
