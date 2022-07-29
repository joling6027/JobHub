<?php
    class JobsDAO{

        private static $db;

        static function initialize(string $className)    {
            //Remember to send in the class name for this DAO
            self::$db = new PDOService($className);
        }

        static function createJob(Jobs $jobs): int{

            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
   
            try{

                $sql ="INSERT INTO jobs (JobLocation,JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
                       VALUES(:JobLocation, :JobCategory, :JobType, :JobPosition, :Salary, :JobDescription, :Duty, :Qualification, :Benefits, :CompanyName, :CreatedOn)";

                self::$db->query($sql);
                self::$db->bind(':JobLocation', $jobs->getJobLocation());
                self::$db->bind(':JobCategory', $jobs->getJobCategory());
                self::$db->bind(':JobType', $jobs->getJobType());
                self::$db->bind(':JobPosition', $jobs->getJobPosition());
                self::$db->bind(':Salary', $jobs->getsalary());
                self::$db->bind(':JobDescription', $jobs->getJobDescription());
                self::$db->bind(':Duty', $jobs->getDuty());
                self::$db->bind(':Qualification', $jobs->getQualification());
                self::$db->bind(':Benefits', $jobs->getBenefits());
                self::$db->bind(':CompanyName', $jobs->getCompanyName());
                self::$db->bind(':CreatedOn', $jobs->getCreatedOn());
                self::$db->execute();

                return self::$db->lastInsertedId();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }

        static function getJobCategories():array{

            try
            {
            $sql = "SELECT * FROM Job_Category";

            self::$db->query($sql);
            self::$db->execute();
            return self::$db->resultSet();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }

        static function getJobTypes():array{

            try{
            $sql = "SELECT * FROM Job_Type";

            self::$db->query($sql);
            self::$db->execute();
            return self::$db->resultSet();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }

        static function getJobs():array{

            $sql = "SELECT * FROM Jobs";

            try{
                self::$db->query($sql);
                self::$db->execute();
                return self::$db->resultSet();

            }catch(Exception $ex){
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }

       static function getJob($jobid){

        $sql = "SELECT * FROM Jobs WHERE JobID=:jobid";

        try{
            self::$db->query($sql);
            self::$db->bind(":jobid", $jobid);
            self::$db->execute();

            return self::$db->singleResult();

        }catch(Exception $ex){
            echo $ex->getMessage();
            error_log($ex->getMessage());
        }
       }
    }
?>