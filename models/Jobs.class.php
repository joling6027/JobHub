<?php
 
    class Jobs{
        private $JobID;
        private $JobLocation;
        private $JobType;
        private $JobPosition;
        private $JobDescription;
        private $CompanyName;

        function getJobId():int{
            return $this->JobID;
        }

        function setJobId(int $jobId){
            $this->JobID = $jobId;
        }

        function getJobLocation():string{
            return $this->JobLocation;
        }

        function setJobLocation(string $jobLocation){
            $this->JobLocation = $jobLocation;
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

        function getJobDescription():string{
            return $this->JobDescription;
        }

        function setJobDescription(string $jobDesc){
            $this->JobDescription = $jobDesc;
        }

        function getCompanyName():string{
            return $this->CompanyName;
        }

        function setCompanyName(string $companyName){
            $this->CompanyName = $companyName;
        }


    }

?>