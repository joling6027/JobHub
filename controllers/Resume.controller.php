<?php

require_once('../inc/Utilities/LoginManager.class.php');
require_once('../inc/Utilities/PDOService.php');
require_once('../inc/Utilities/JobAppliedDAO.php');
require_once('../models/JobApplied.class.php');
require_once('../inc/config.inc.php');

if(LoginManager::verifyLogin())
{
    if(!empty($_GET))
    {
        JobAppliedDAO::initialize(JOBAPPLIED);
        $response = JobAppliedDAO::getResume($_GET['id']);
        if(!empty($response))
        {
            header("Content-type: application/pdf");
            header("Content-disposition: download; filename=".$response->Fname."_".$response->Lname."_"."Resume.pdf");
            echo $response->getResume();
            header(LOCATION_ADMIN);
            exit;
        }
    }
}
else{
    header(LOCATION_LOGIN);
    exit;
}