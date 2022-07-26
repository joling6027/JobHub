<?php

require_once('../inc/config.inc.php');
require_once('../views/component/footer.page.php');
require_once('../views/component/header.page.php');
require_once('../views/User.page.php');
require_once('../inc/Utilities/LoginManager.class.php');
require_once('../inc/Utilities/PDOService.php');
require_once('../inc/Utilities/UsersDAO.class.php');
require_once('../inc/Utilities/JobsDAO.class.php');
require_once('../inc/Utilities/JobAppliedDAO.php');
require_once('../models/Users.class.php');
require_once('../models/Jobs.class.php');
require_once('../models/JobApplied.class.php');



//init jobDAO
JobsDAO::initialize(JOBS);
//get job data
$jobs = JobsDAO::getJobs();


if(LoginManager::verifyLogin()){
  
  UsersDAO::initialize(USERS);
  $user = UsersDAO::getUser($_SESSION['username']['Email']);
  PageHeader::header(true);

}
else{
  PageHeader::header(true);
}


if (isset($_GET['jobdesc']) && isset($_GET['jobid'])) {
    $job = JobsDAO::getJob($_GET['jobid']);

    $_SESSION['jobdesc'] = $_GET['jobdesc'];
    $_SESSION['jobid'] = $_GET['jobid'];

    UserPage::showJobDescription($job);

    if(isset($_SESSION['username']['Name'])){
    UserPage::applyForm($user);

    if (!empty($_POST) && !empty($_FILES['resume']['name'])) {
      $applicant = new JobApplied();
      $applicant->setUserID($user->getUserID());
      $applicant->setJobID($_SESSION['jobid']);
      $applicant->setDesiredPay($_POST['desiredPay']);
      $applicant->setAdditionalUrls($_POST['additionalUrl']);
      $applicant->setComments($_POST['comments']);

      //handle upload file
      if ($_FILES['resume']['error'] != 0) {
        // notification-- something wrong
      } else {
        // $file_name = $_FILES['resume']['name'];
        $file_tmp = $_FILES['resume']['tmp_name'];
        if ($pdf_blob = fopen($file_tmp, "rb")) {
          $applicant->setResume($pdf_blob);

          //save to database
          JobAppliedDAO::initialize(JOBAPPLIED);
          $apply = JobAppliedDAO::createNewJobApplied($applicant);
        } else {
          echo "Could not open the attached file.";
        }
      }
    } else {
      //notification -- file upload not successful
    }
    }
    

}else{
  UserPage::showEntrance($jobs);

}


PageFooter::footer(true);

