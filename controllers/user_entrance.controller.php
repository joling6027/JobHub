<?php

require_once('../inc/config.inc.php');
require_once('../inc/Utilities/LoginManager.class.php');
require_once('../inc/Utilities/PDOService.php');
require_once('../inc/Utilities/UsersDAO.class.php');
require_once('../inc/Utilities/JobsDAO.class.php');
require_once('../views/Login.page.php');
require_once('../models/Users.class.php');
require_once('../models/Jobs.class.php');

require_once('../views/component/footer.page.php');
require_once('../views/component/header.page.php');
require_once('../views/User.page.php');


//init jobDAO
JobsDAO::initialize(JOBS);

//populate job data
$jobs = JobsDAO::getJobs();
// UserPage::showEntrance($jobs);

if(LoginManager::verifyLogin()){
  
  UsersDAO::initialize(USERS);
  $user = UsersDAO::getUser($_SESSION['username']['Email']);
  PageHeader::header(true);
  

}else{
  PageHeader::header(false);

}

if (isset($_GET['jobdesc']) && isset($_GET['jobid'])) {
    $job = JobsDAO::getJob($_GET['jobid']);

    $_SESSION['jobdesc'] = $_GET['jobdesc'];
    $_SESSION['jobid'] = $_GET['jobid'];

    UserPage::showJobDescription($job);
    UserPage::applyForm();

    if(isset($_POST['submit'])){
      
    }

}else{
  UserPage::showEntrance($jobs);

}


PageFooter::footer(true);

