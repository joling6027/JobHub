<?php

    require_once('../../inc/config.inc.php');
    require_once('../../views/component/footer.page.php');
    require_once('../../views/component/header.page.php');
    require_once('../../views/admin/Index.page.php');
    require_once('../../inc/Utilities/PDOService.php');
    require_once('../../inc/Utilities/JobsDAO.class.php');
    require_once('../../inc/Utilities/UsersDAO.class.php');
    require_once('../../models/Jobs.class.php');
    require_once('../../models/Users.class.php');
    require_once('../../inc/Utilities/LoginManager.class.php');
    
    if(LoginManager::verifyLogin())
    {
        JobsDAO::initialize(JOBS);
        UsersDAO::initialize(USERS);
        $categories = JobsDAO::getJobCategories();
        $types = JobsDAO::getJobTypes();
    
        PageIndex::$categories = $categories;
        PageIndex::$types = $types;
    
        $users = UsersDAO::getUsers();
    
        if (isset($_GET["action"]))  {
            if($_GET["action"] == "edit")
            {
                header(LOCATION_USER_DETAILS);
                exit;
            }

            if ($_GET["action"] == "delete")  {
                if(UsersDAO::deleteUser($_GET["id"]))
                {
                    header(LOCATION_ADMIN);
                    exit;
                }
            }
            else{
                //show toast for user not deleted
            }
        }

        
       
        if(!empty($_POST) && isset($_POST))
        {
            $job = new Jobs();
            $job->setCategory($_POST['categoryDD']);
            $job->setJobLocation($_POST['jobLocation']);
            $job->setJobType($_POST['typeDD']);
            $job->setJobTitle($_POST['jobtitle']);
            $job->setsalary($_POST['salary']);
            $job->setJobDescription($_POST['descriptionTA']);
            $job->setDuty($_POST['dutyTA']);
            $job->setQualification($_POST['qualificationTA']);
            $job->setBenefits($_POST['benefitsTA']);
            $job->setCompanyName($_POST['companyName']);
            $job->setCreatedOn();
    
            $res = JobsDAO::createJob($job);
    
            // if($res > 0)
            // {
            //    //show toast for user not created
            // }
    
        }
            PageHeader::header(true);
            PageIndex::adminDetails("Jaspal3101@gmail.com", "Jaspal Singh");
            PageIndex::createJobs();
            PageIndex::existingJobs();
            PageIndex::manageUsers($users);
            PageFooter::footer(true);
    }
    else{
        header(LOCATION_LOGIN);
        exit;
    }
