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
    define("JOBAPPLIED", 'JobApplied');

    //define password regex
    define("PHONE_VALIDATION", "/^\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/");
    define("PASS_VALIDATION", "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/");

    //User ROle
    define('ROLE_ADMIN', "Admin");
    define('ROLE_USER', "User");

    //Header Location
    define("LOCATION_LOGIN", "Location: ./Login.controller.php");
    define("LOCATION_LOGOUT", "Location: ./Logout.controller.php");
    define("LOCATION_ADMIN", "Location: ./admin/Index.controller.php");
    define("LOCATION_USER", "Location: ./Register.controller.php");
    define("LOCATION_USER_DETAILS", "Location: ./admin/User_details.controller.php");
    define("LOCATION_USER_ENTRANCE","Location: ./user_entrance.controller.php");
    define("SECURE_TOKEN", "5f66daf9-e5a0-4ac4-9bea-768012559fde");
    define("FROM_EMAIL", "jaspal3101@gmail.com");

?>