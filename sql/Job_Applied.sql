--DROP DB IF EXISTS
DROP DATABASE IF EXISTS JobPortal;

--CREATE DB IF NOT EXISTS
CREATE DATABASE IF NOT EXISTS JobPortal;

--USE JobPortal DATABASE
USE JobPortal;

CREATE TABLE  Job_Applied  (
 AppliedID int(11) NOT NULL AUTO_INCREMENT,
 UserID  int(11) NOT NULL,
 JobID  int(11) NOT NULL,
 JobType  varchar(20) NOT NULL,
 JobPosition  varchar(20) NOT NULL,
 DesiredPay  varchar(20) DEFAULT NULL,
 AdditionalUrls  varchar(50) DEFAULT NULL,
 Comments  varchar(500) DEFAULT NULL,
 Resume  longblob DEFAULT NULL,
 PRIMARY KEY ( AppliedID ),
 KEY  UserID  ( UserID ),
 KEY  JobID  ( JobID ),
 CONSTRAINT  job_applied_ibfk_1  FOREIGN KEY ( UserID ) REFERENCES  users  ( UserID ) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT  job_applied_ibfk_2  FOREIGN KEY ( JobID ) REFERENCES  jobs  ( JobID ) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4