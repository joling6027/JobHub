<?php

class JobAppliedDAO
{

  private static $db;

  static function initialize(string $className)
  {
    self::$db = new PDOService($className);
  }

  static function createNewJobApplied(JobApplied $jobApplied): int
  {

    try {

      $sql = "INSERT INTO Job_Applied (UserID,JobID,DesiredPay,AdditionalUrls,Comments,Resume,AppliedOn) 
              VALUES (:userid,:jobid,:desiredPay,:additionalUrls,:comments,:resume,:appliedOn)";

      self::$db->query($sql);
      self::$db->bind(":userid", $jobApplied->getUserID());
      self::$db->bind(":jobid", $jobApplied->getJobID());
      self::$db->bind(":desiredPay", $jobApplied->getDesiredPay());
      self::$db->bind(":additionalUrls", $jobApplied->getAdditionalUrls());
      self::$db->bind(":comments", $jobApplied->getComments());
      self::$db->bind(":resume", $jobApplied->getResume());

      date_default_timezone_set('America/Vancouver');
      $date = date('Y-m-d');
      self::$db->bind("appliedOn", $date);

      self::$db->execute();

      return self::$db->lastInsertedId();
    } catch (Exception $ex) {
      echo $ex->getMessage();
      error_log($ex->getMessage());
    }
  }

  static function getJobs($category): array
  {
    $jobList = array();
    $it_jobs = array();
    $mt_jobs = array();
    $lb_jobs = array();

    $sql = "SELECT * FROM Jobs";
    try {
      self::$db->query($sql);
      self::$db->execute();
      $jobs = self::$db->resultSet();
      foreach ($jobs as $job) {
        if ($job->JobCategory == $category[0]) {
          $it_jobs[] = $job;
        }

        if ($job->JobCategory == $category[1]) {
          $mt_jobs[] = $job;
        }

        if ($job->JobCategory == $category[2]) {
          $lb_jobs[] = $job;
        }
      }

      if (!empty($it_jobs)) {
        $jobList['IT'] = $it_jobs;
      }
      if (!empty($mt_jobs)) {
        $jobList['MT'] = $mt_jobs;
      }
      if (!empty($lb_jobs)) {
        $jobList['LB'] = $lb_jobs;
      }

      return $jobList;
    } catch (Exception $exc) {
      echo $exc->getMessage();
      return false;
    }
  }

  static function getAppliedJob($userid, $jobid)
  {

    $sql = "SELECT * FROM Job_Applied WHERE UserID=:userid AND JobID=:jobid";

    try {
      self::$db->query($sql);
      self::$db->bind(":userid", $userid);
      self::$db->bind(":jobid", $jobid);
      self::$db->execute();

      return self::$db->singleResult();
    } catch (Exception $ex) {
      echo $ex->getMessage();
      error_log($ex->getMessage());
    }
  }

  static function getResume($appliedId)
  {

    $sql = "SELECT users.Fname, users.Lname, Job_Applied.Resume 
           FROM users JOIN Job_Applied 
           ON users.UserID = Job_Applied.UserID 
           WHERE job_applied.AppliedID=:appliedId";
    try {
      self::$db->query($sql);
      self::$db->bind(':appliedId', (int)$appliedId);
      self::$db->execute();
      return self::$db->singleResult();
    } catch (Exception $exc) {
      echo $exc->getMessage();
      return false;
    }
  }
}
