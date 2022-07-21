<?php
 
    class JobApplied{
        private $AppliedID;
        private $UserID;
        private $JobID;
        private $JobType;
        private $JobPosition;
        private $DesiredPay;
        private $AdditionalUrls;
        private $Comments;
        private $Resume;
        

        function getAppliedID():int{
            return $this->AppliedID;
        }

        function setAppliedID(int $appliedId){
            $this->AppliedID = $appliedId;
        }

        function getUserID():int{
            return $this->UserID;
        }

        function setUserID(int $userId){
            $this->UserID = $userId;
        }

        function getJobID():int{
            return $this->JobID;
        }

        function setJobID(int $jobId){
            $this->JobID = $jobId;
        }

        function getJobType():string{
            return $this->JobType;
        }

        function setJobType(string $jobType){
            $this->JobType = $jobType;
        }


        function getJobPosition():string{
            return $this->JobPosition;
        }

        function setJobPosition(string $jobPosition){
            $this->JobPosition = $jobPosition;
        }

        function getComments():string{
            return $this->Comments;
        }

        function setComments(string $desc){
            $this->Comments = $desc;
        }

        function getDesiredPay():string{
            return $this->DesiredPay;
        }

        function setDesiredPay(string $desirePay){
            $this->DesiredPay = $desirePay;
        }

        function getAdditionalUrls():string{
            return $this->AdditionalUrls;
        }

        function setAdditionalUrls(string $additionalUrl)
        {
            $this->AdditionalUrls = $additionalUrl;
        }

        function getResume()
        {
            $this->Resume;
        }

        function setResume($resume)
        {
            $this->Resume = $resume;
        }

    }

?>