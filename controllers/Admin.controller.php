<?php

    require_once('../inc/config.inc.php');
    require_once('../views/component/footer.page.php');
    require_once('../views/component/header.page.php');
    require_once('../views/Admin.page.php');
    require_once('../inc/Utilities/PDOService.php');
    require_once('../inc/Utilities/JobsDAO.class.php');
    require_once('../inc/Utilities/UsersDAO.class.php');
    require_once('../models/Jobs.class.php');
    require_once('../models/Users.class.php');
    require_once('../models/JobApplied.class.php');
    require_once('../inc/Utilities/LoginManager.class.php');
    require_once('../inc/Utilities/JobAppliedDAO.php');
    require_once('../inc/Utilities/Extension.class.php');
    require_once('../inc/Utilities/Validation.class.php');
    

    if(LoginManager::verifyLogin())
    {
        JobsDAO::initialize(JOBS);
        UsersDAO::initialize(USERS);
        JobAppliedDAO::initialize(JOBAPPLIED);
        $categories = JobsDAO::getJobCategories();
        $types = JobsDAO::getJobTypes();
        $jobs = JobAppliedDAO::getJobs($category);
    
        PageAdmin::$categories = $categories;
        PageAdmin::$types = $types;
    
        $users = UsersDAO::getUsers();
    
        if (isset($_GET["action"]))  {
            if($_GET["action"] == "edit")
            {
                header("Location: ".LOCATION_USER_DETAILS);
                exit;
            }

            if($_GET["action"] == "jobs")
            {
                header("Location: ".LOCATION_APPLIED_JOBS."?action=jobs&id=".$_GET['id']);
                exit;
            }

            if ($_GET["action"] == "delete")  {
                if(UsersDAO::deleteUser($_GET["id"]))
                {
                    
                    $_SESSION['msg']['success'] = "User is deleted sucessfully.";
                    error_log('Admin: User is deleted sucessfully.');
                }
                else{
                    $_SESSION['msg']['error'] = "User is not deleted.";
                    error_log('Admin: User is not deleted.');
                }
                $_SESSION['msg']['url'] = LOCATION_ADMIN;
            }
            DropOff::verifyMessage();
            PageHeader::header(true);
            PageAdmin::adminDetails($_SESSION['username']['Email'], $_SESSION['username']['Name']);
            PageAdmin::createJobs();
            PageAdmin::existingJobs($jobs, $category, $type);
            PageAdmin::manageUsers($users);
            PageFooter::footer(true);
           
        }

        if(!empty($_POST) && isset($_POST))
        {
                PageAdmin::$errors = [];
                $job = new Jobs();
                $job->setJobCategory(trim($_POST['categoryDD']));
                $job->setJobLocation(trim($_POST['jobLocation']));
                $job->setJobType(trim($_POST['typeDD']));
                $job->setJobPosition(trim($_POST['jobtitle']));
                $job->setsalary(trim($_POST['salary']));
                $job->setJobDescription(trim($_POST['descriptionTA']));
                $job->setDuty(trim($_POST['dutyTA']));
                $job->setQualification(trim($_POST['qualificationTA']));
                $job->setBenefits(trim($_POST['benefitsTA']));
                $job->setCompanyName(trim($_POST['companyName']));
                $job->setCreatedOn();

                $isValid = Validate::validateNewJob($job);
                PageAdmin::$errors = $isValid;
                if(count($isValid) <= 0)
                {
                    $res = JobsDAO::createJob($job);
                    if($res > 0)
                    {
                    $_SESSION['msg']['success'] = "Job is created sucessfully.";
                    }
                    else{
                    $_SESSION['msg']['error'] = "Job is not created.";
                    error_log('Admin: Job is not created.');
                    }
                    $_SESSION['msg']['url'] = LOCATION_ADMIN;
                    DropOff::verifyMessage();
                    PageHeader::header(true);
                    PageAdmin::adminDetails($_SESSION['username']['Email'], $_SESSION['username']['Name']);
                    PageAdmin::createJobs();
                    PageAdmin::existingJobs($jobs, $category, $type);
                    PageAdmin::manageUsers($users);
                    PageFooter::footer(true);
                }
                else{
                    DropOff::verifyMessage();
                    PageHeader::header(true);
                    PageAdmin::adminDetails($_SESSION['username']['Email'], $_SESSION['username']['Name']);
                    PageAdmin::createJobs();
                    PageAdmin::existingJobs($jobs, $category, $type);
                    PageAdmin::manageUsers($users);
                    PageFooter::footer(true);
                }
        }
        else{
            DropOff::verifyMessage();
            PageHeader::header(true);
            PageAdmin::adminDetails($_SESSION['username']['Email'], $_SESSION['username']['Name']);
            PageAdmin::createJobs();
            PageAdmin::existingJobs($jobs, $category, $type);
            PageAdmin::manageUsers($users);
            PageFooter::footer(true);
        }
    }
    else{
        header("Location: ".LOCATION_LOGIN);
        exit;
    }
