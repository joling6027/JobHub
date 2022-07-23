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
                header(LOCATION_LOGOUT);
                exit;
            }
            else{
                //error password not updated.
            }
        }
    }
}
else{
    header(LOCATION_LOGIN);
    exit;
}
