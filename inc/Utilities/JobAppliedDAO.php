<?php

class JobAppliedDAO{

  private static $db;

  static function initialize(string $className){
    self::$db = new PDOService($className);
  }

  static function createNewJobApplied(JobApplied $jobApplied): int{

    try{

      $sql = "INSERT INTO Job_Applied (UserID,JobID,DesiredPay,AdditionalUrls,Comments,Resume,AppliedOn) VALUES (:userid,:jobid,:desiredPay,:additionalUrls,:comments,:resume,:appliedOn)";

      self::$db->query($sql);
      self::$db->bind(":userid", $jobApplied->getUserID());
      self::$db->bind(":jobid",$jobApplied->getJobID());
      self::$db->bind(":desiredPay",$jobApplied->getDesiredPay());
      self::$db->bind(":additionalUrls",$jobApplied->getAdditionalUrls());
      self::$db->bind(":comments", $jobApplied->getComments());
      self::$db->bind(":resume", $jobApplied->getResume());

      date_default_timezone_set('America/Vancouver');
      $date = date('Y-m-d');
      self::$db->bind("appliedOn", $date);

      self::$db->execute();
      
      return self::$db->lastInsertedId();

    }catch(Exception $ex){
      echo $ex->getMessage();
      error_log($ex->getMessage());
    }
  }










}

?>