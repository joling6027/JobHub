<?php


require_once('../inc/config.inc.php');
require_once('../views/component/footer.page.php');
require_once('../views/component/header.page.php');
require_once('../views/Applied_Jobs.page.php');
require_once('../inc/Utilities/PDOService.php');
require_once('../inc/Utilities/UsersDAO.class.php');
require_once('../inc/Utilities/JobsDAO.class.php');
require_once('../models/Users.class.php');
require_once('../models/Jobs.class.php');
require_once('../inc/Utilities/LoginManager.class.php');

$users;
$job;
if(LoginManager::verifyLogin())
{
    UsersDAO::initialize(USERS);
    JobsDAO::initialize(JOBS);
    $categories = JobsDAO::getJobCategories();
    $types = JobsDAO::getJobTypes();
    PageJobApplied::$categories = $categories;
    PageJobApplied::$types = $types;
    if(!empty($_GET))
    {
        if($_GET["action"] == "jobs")
        {
            $users = UsersDAO::getUsersAppliedJob($_GET['id']);
            $job = JobsDAO::getJob($_GET['id']);
           
        }

        if($_GET["action"] == "download")
        {
           header(LOCATION_RESUME."?action=".$_GET['action']."&id=".$_GET['id']);
           exit;
        }

       
    }
   
    if(!empty($_POST))
    {
        $job = new Jobs();
        $job->setJobId($_POST['jobId']);
        $job->setJobCategory($_POST['categoryDD']);
        $job->setJobLocation($_POST['jobLocation']);
        $job->setJobType($_POST['typeDD']);
        $job->setJobPosition($_POST['jobtitle']);
        $job->setsalary($_POST['salary']);
        $job->setJobDescription($_POST['descriptionTA']);
        $job->setDuty($_POST['dutyTA']);
        $job->setQualification($_POST['qualificationTA']);
        $job->setBenefits($_POST['benefitsTA']);
        $job->setCompanyName($_POST['companyName']);
        $job->setCreatedOn();

        $res = JobsDAO::updateJob($job);
        if($res>0){
            //green toast
        }
        else{
            //red toast
        }
    }
    
    PageHeader::header(true);
    PageJobApplied::userAppliedJobs($users);
    PageJobApplied::editJobs($job);
    PageFooter::footer(true);
   
}
else{
    header(LOCATION_LOGIN);
    exit;
}

