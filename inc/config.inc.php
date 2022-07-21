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


?>