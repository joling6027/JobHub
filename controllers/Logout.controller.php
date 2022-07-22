<?php

require_once('../inc/config.inc.php');
require_once('../inc/Utilities/LoginManager.class.php');

if(LoginManager::verifyLogin())
{
    unset($_SESSION['username']);
    session_destroy();
    
}
header(LOCATION_LOGIN);
exit;
