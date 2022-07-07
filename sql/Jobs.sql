--DROP DB IF EXISTS
DROP DATABASE IF EXISTS JobPortal;

--CREATE DB IF NOT EXISTS
CREATE DATABASE IF NOT EXISTS JobPortal;

--USE JobPortal DATABASE
USE JobPortal;

CREATE TABLE Jobs (
 JobID int(11) NOT NULL AUTO_INCREMENT,
 JobLocation varchar(100) NOT NULL,
 JobType varchar(4) NOT NULL COMMENT 'It should be job type code come from another table of job type example FT(Full time), PT(Part Time)',
 JobPosition varchar(50) NOT NULL,
 JobDescription varchar(500) NOT NULL,
 JDFile longblob NOT NULL,
 CompanyName varchar(200) NOT NULL,
 PRIMARY KEY ( JobID )
) ENGINE=InnoDB