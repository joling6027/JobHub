<?php

require_once('../inc/config.inc.php');
// require_once('../inc/Utilities/LoginManager.class.php');

// if(LoginManager::verifyLogin())
// {
//     unset($_SESSION['username']);
//     session_destroy();
    
// }
header("Location: ".LOCATION_LOGIN);
exit;



// require_once('../inc/config.inc.php');
// require_once('../inc/Utilities/LoginManager.class.php');
// require_once('../views/component/header.page.php');
// require_once('../inc/Utilities/Extension.class.php');
// require_once('../views/Login.page.php');

// if(LoginManager::verifyLogin())
// {
//     PageHeader::header();
//     PageLogin::login();
//     DropOff::verifyMessage();
//     unset($_SESSION['username']);
//     session_destroy();
//     header("Location: ".LOCATION_LOGIN);
//     exit;
// }
// else{
//     header("Location: ".LOCATION_LOGIN);
//     exit;
// }