<?php

    // define("DB_HOST", "localhost");  
    // define("DB_USER", "root");  
    // define("DB_PASS", "");  
    // define("DB_NAME", "JobHub");
    define("DB_PORT", "3306");


 

    // definition for log file
    define('LOGFILE','../log/error_log.txt');
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
    define("LOCATION_LOGIN", "./Login.controller.php");
    define("LOCATION_LOGOUT", "./Logout.controller.php");
    define("LOCATION_ADMIN", "./Admin.controller.php");
    define("LOCATION_USER", "./Register.controller.php");
    define("LOCATION_APPLIED_JOBS", "./Applied_Jobs.controller.php");
    define("LOCATION_RESUME", "./Resume.controller.php");
    define("LOCATION_USER_DETAILS", "./User_details.controller.php");
    define("LOCATION_USER_ENTRANCE","./TeamNumber01.php");
    define("LOCATION_TEAM_NUMBER_01","controllers/TeamNumber01.php");

    define("SECURE_TOKEN", "5f66daf9-e5a0-4ac4-9bea-768012559fde");
    define("FROM_EMAIL", "jaspal3101@gmail.com");

    //Category
    define('IT','Information Technology');
    define('MT','Management');
    define('LB','Labour');
    
    $category = array('IT', 'MT', 'LB');

    //type
    define('FT','Full-Time');
    define('PT','Part-Time');
    $type = array('FT', 'PT');



?>