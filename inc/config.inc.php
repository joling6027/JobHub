<?php

    define("DB_HOST", "localhost");  
    define("DB_USER", "root");  
    define("DB_PASS", "");  
    define("DB_NAME", "JobHub");
    define("DB_PORT", "3306");  

    // definition for log file
    define('LOGFILE','log/error_log.txt');
    ini_set("log_errors", TRUE);  
    ini_set('error_log', LOGFILE); 
    

    //Model classes
    define('USERS', 'Users');
    define('JOBS', 'Jobs');

    //User ROle
    define('ROLE_ADMIN', "Admin");
    define('ROLE_USER', "User");

    //Header Location
    define("LOCATION_LOGIN", "Location: /CSIS/JobPortal/controllers/Login.controller.php");
    define("LOCATION_LOGOUT", "Location: /CSIS/JobPortal/controllers/Logout.controller.php");
    define("LOCATION_ADMIN", "Location: /CSIS/JobPortal/controllers/admin/Index.controller.php");
    define("LOCATION_USER", "Location: /CSIS/JobPortal/controllers/Register.controller.php");
    define("LOCATION_USER_DETAILS", "Location: /CSIS/JobPortal/controllers/admin/User_details.controller.php");
    define("SECURE_TOKEN", "5f66daf9-e5a0-4ac4-9bea-768012559fde");
    define("FROM_EMAIL", "jaspal3101@gmail.com");

?>