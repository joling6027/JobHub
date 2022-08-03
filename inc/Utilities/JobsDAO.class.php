<?php
class JobsDAO
{

    private static $db;

    static function initialize(string $className)
    {
        self::$db = new PDOService($className);
    }

    static function createJob(Jobs $job): int
    {

        try {

            $sql = "INSERT INTO jobs (JobLocation,JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
                       VALUES(:JobLocation, :JobCategory, :JobType, :JobPosition, :Salary, :JobDescription, :Duty, :Qualification, :Benefits, :CompanyName, :CreatedOn)";

            self::$db->query($sql);
            self::$db->bind(':JobLocation', $job->getJobLocation());
            self::$db->bind(':JobCategory', $job->getJobCategory());
            self::$db->bind(':JobType', $job->getJobType());
            self::$db->bind(':JobPosition', $job->getJobPosition());
            self::$db->bind(':Salary', $job->getsalary());
            self::$db->bind(':JobDescription', $job->getJobDescription());
            self::$db->bind(':Duty', $job->getDuty());
            self::$db->bind(':Qualification', $job->getQualification());
            self::$db->bind(':Benefits', $job->getBenefits());
            self::$db->bind(':CompanyName', $job->getCompanyName());
            self::$db->bind(':CreatedOn', $job->getCreatedOn());
            self::$db->execute();

            return self::$db->lastInsertedId();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            error_log($ex->getMessage());
        }
    }

    static function updateJob($job): int
    {

        try {
            $sql = "UPDATE jobs SET JobLocation=:JobLocation,
                                        JobCategory=:JobCategory,
                                        JobType=:JobType,
                                        JobPosition=:JobPosition,
                                        Salary=:Salary,
                                        JobDescription=:JobDescription,
                                        Duty=:Duty,
                                        Qualification=:Qualification,
                                        Benefits=:Benefits,
                                        CompanyName=:CompanyName,
                                        CreatedOn=:CreatedOn
                        WHERE JobID=:JobID";
            self::$db->query($sql);
            self::$db->bind(':JobLocation', $job->getJobLocation());
            self::$db->bind(':JobCategory', $job->getJobCategory());
            self::$db->bind(':JobType', $job->getJobType());
            self::$db->bind(':JobPosition', $job->getJobPosition());
            self::$db->bind(':Salary', $job->getsalary());
            self::$db->bind(':JobDescription', $job->getJobDescription());
            self::$db->bind(':Duty', $job->getDuty());
            self::$db->bind(':Qualification', $job->getQualification());
            self::$db->bind(':Benefits', $job->getBenefits());
            self::$db->bind(':CompanyName', $job->getCompanyName());
            self::$db->bind(':CreatedOn', $job->getCreatedOn());
            self::$db->bind(':JobID', $job->getJobId());
            self::$db->execute();

            return self::$db->rowCount();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            error_log($ex->getMessage());
        }
    }

    static function getJobCategories(): array
    {

        try {
            $sql = "SELECT * FROM Job_Category";

            self::$db->query($sql);
            self::$db->execute();
            return self::$db->resultSet();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            error_log($ex->getMessage());
        }
    }

    static function getJobTypes(): array
    {

        try {
            $sql = "SELECT * FROM Job_Type";

            self::$db->query($sql);
            self::$db->execute();
            return self::$db->resultSet();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            error_log($ex->getMessage());
        }
    }

    static function getJobs(): array
    {

        $sql = "SELECT * FROM Jobs";

        try {
            self::$db->query($sql);
            self::$db->execute();
            return self::$db->resultSet();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            error_log($ex->getMessage());
        }
    }

    static function getJob($jobid)
    {

        $sql = "SELECT * FROM Jobs WHERE JobID=:jobid";

        try {
            self::$db->query($sql);
            self::$db->bind(":jobid", $jobid);
            self::$db->execute();

            return self::$db->singleResult();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            error_log($ex->getMessage());
        }
    }

    static function deleteJob(string $jobId): bool
    {

        $sql = "DELETE FROM Jobs WHERE JobID = :JobID";
        try {
            self::$db->query($sql);
            self::$db->bind(':JobID', $jobId);
            self::$db->execute();

            if (self::$db->rowCount() != 1) {
                throw new Exception("Problem deleting user $jobId");
            }
        } catch (Exception $exc) {
            error_log($exc->getMessage());
            return false;
        }

        return true;
    }
}
