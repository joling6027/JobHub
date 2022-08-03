<?php

    require_once('../views/component/footer.page.php');
    require_once('../views/component/header.page.php');
    require_once('../inc/Utilities/LoginManager.class.php');
    require_once('../inc/Utilities/PDOService.php');
    require_once('../inc/Utilities/UsersDAO.class.php');
    require_once('../views/Login.page.php');
    require_once('../inc/config.inc.php');
    require_once('../models/Users.class.php');
    require_once('../inc/Utilities/Extension.class.php');

if(!LoginManager::verifyLogin())
{
    if(!empty($_POST))
    {
        UsersDAO::initialize(USERS);

        if(isset($_POST['email'])){
            $user = UsersDAO::getUser($_POST['email']);
            if($user && LoginManager::verifyPassword($_POST['password'], $user->getPassword()))
            {
                session_start();
                $_SESSION['username'] = array('Email'=> $user->getEmail(), 'Name' => $user->getFname()." ". $user->getLname());
                $_SESSION['user_role'] = $user->getRole(); //for click on logo -> go back to home page purpose
                if($user->getRole() == ROLE_ADMIN){
                    header("Location: ".LOCATION_ADMIN);
                    exit;
                }
                if($user->getRole() == ROLE_USER){
                    header("Location: ".LOCATION_USER_ENTRANCE);
                    exit;
                }
                
            }
            else{
                PageLogin::$notification['loginError'] = "Email or password is invalid";
                error_log('Login: Email or password is invalid.');
            }
        }
    }
    
    PageHeader::header();
    PageLogin::login();
}
else{
    PageHeader::header();
    PageLogin::login();
    DropOff::verifyMessage(true);   
    unset($_SESSION['username']);
    session_destroy();
}