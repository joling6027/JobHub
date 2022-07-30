<?php
    require_once('../inc/config.inc.php');
    require_once('../views/component/footer.page.php');
    require_once('../views/component/header.page.php');
    require_once('../views/User_details.page.php');
    require_once('../inc/Utilities/PDOService.php');
    // require_once(../../inc/Utilities/JobsDAO.class.php');
    require_once('../inc/Utilities/UsersDAO.class.php');
    // require_once('../../models/Jobs.class.php');
    require_once('../models/Users.class.php');

    UsersDAO::initialize(USERS);
    
   
    if(!empty($_POST) && isset($_POST))
    {
        $user = new Users();
        $user->setFname($_POST['fname']);
        $user->setLname($_POST['lname']);
        $user->setPhone($_POST['phone']);
        $user->setUserID($_POST['id']);
        $res = UsersDAO::updateUser($user);

        if($res > 0)
        {
           //update notification 
        }
        header(LOCATION_ADMIN);
        exit;
    }
    else
    {
        PageHeader::header(true);
        if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
            $user = UsersDAO::getUserById($_GET['id']);
        }
        PageUserDetails::userInfo($user);
        PageFooter::footer(true);
    }
