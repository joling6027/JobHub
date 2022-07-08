<?php

    require_once('../inc/config.inc.php');
    require_once('../views/component/footer.page.php');
    require_once('../views/component/header.page.php');
    require_once('../views/Register.page.php');
    require_once('../inc/Utilities/PDOService.php');
    require_once('../inc/Utilities/UsersDAO.class.php');
    require_once('../models/Users.class.php');

   
    UsersDAO::initialize(USERS);

    if(!empty($_POST) && isset($_POST))
    {
        $user = new Users();
        $user->setFname($_POST['fname']);
        $user->setLname($_POST['lname']);
        $user->setEmail($_POST['email']);
        $user->setPhone($_POST['phone']);
        $user->setPassword($_POST['password']);
        $user->setAgreement($_POST['agreement']);
        $user->setRole();
        
        $res = UsersDAO::createUser($user);

        if($res > 0)
        {
            header("Location: Login.controller.php");
            exit;
        }

    }
    else{
        PageHeader::header();
        PageHeader::nav();
        PageRegister::register();
    }

?>