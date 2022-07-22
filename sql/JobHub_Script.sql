--DROP DB IF EXISTS
DROP DATABASE IF EXISTS JobHub;

--CREATE DB IF NOT EXISTS
CREATE DATABASE IF NOT EXISTS JobHub;

--USE JobPortal DATABASE
USE JobHub;

--Drop Table 
DROP TABLE IF EXISTS Users;

--CREATE TABLE USERS
CREATE TABLE Users (
  UserID INT NOT NULL AUTO_INCREMENT,
  Fname VARCHAR(50) NOT NULL,
  Lname VARCHAR(50) DEFAULT NULL,
  Email VARCHAR(50) NOT NULL UNIQUE,
  Phone VARCHAR(20) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  Role CHAR(6) NOT NULL,
  Agreement TINYINT(1) NOT NULL,
  PRIMARY KEY ( UserID )
)ENGINE=InnoDB;

--Drop Table 
DROP TABLE IF EXISTS Jobs; 

CREATE TABLE Jobs (
 JobID INT NOT NULL AUTO_INCREMENT,
 JobLocation VARCHAR(100) NOT NULL,
 JobCategory VARCHAR(100) NOT NULL,
 JobType VARCHAR(4) NOT NULL,
 JobPosition VARCHAR(50) NOT NULL,
 Salary NUMERIC(8) CHECK (Salary > 0),
 JobDescription VARCHAR(500) NOT NULL,
 Duty VARCHAR(500),
 Qualification VARCHAR(500),
 Benefits VARCHAR(500),
 CompanyName VARCHAR(200) NOT NULL,
 CreatedOn DATE DEFAULT NULL,
 PRIMARY KEY ( JobID )
) ENGINE=InnoDB;


--Drop Table 
DROP TABLE IF EXISTS Job_Applied;

CREATE TABLE Job_Applied (
 AppliedID int(11) NOT NULL AUTO_INCREMENT,
 UserID int(11) NOT NULL,
 JobID int(11) NOT NULL,
 DesiredPay varchar(20) DEFAULT NULL,
 AdditionalUrls varchar(50) DEFAULT NULL,
 Comments varchar(500) DEFAULT NULL,
 Resume longblob DEFAULT NULL,
 AppliedOn date DEFAULT NULL,
 PRIMARY KEY (AppliedID, UserID, JobID),
 KEY job_applied_ibfk_1 (UserID),
 KEY job_applied_ibfk_2 (JobID),
 CONSTRAINT job_applied_ibfk_1 FOREIGN KEY (UserID) REFERENCES users (UserID) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT job_applied_ibfk_2 FOREIGN KEY (JobID) REFERENCES jobs (JobID) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;

--Drop Table 
DROP TABLE IF EXISTS Job_Category;

CREATE TABLE Job_Category (
 CategoryId int NOT NULL AUTO_INCREMENT,
 CategoryValue varchar(20) NOT NULL,
 CategoryName varchar(50) NOT NULL,
 PRIMARY KEY (CategoryId)
) ENGINE=InnoDB;

INSERT INTO Job_Category(CategoryValue, CategoryName)
VALUES('IT', 'Information Technology'),
      ('MT', 'Management'),
      ('LB', 'Labour');

--Drop Table 
DROP TABLE IF EXISTS Job_Type; 

CREATE TABLE Job_Type (
 JobTypeId int NOT NULL AUTO_INCREMENT,
 JobTypeValue varchar(10) NOT NULL,
 JobTypeName varchar(10) NOT NULL,
 PRIMARY KEY (JobTypeId)
) ENGINE=InnoDB;

INSERT INTO Job_Type(JobTypeValue, JobTypeName)
VALUES('FT', 'Full-Time'),
      ('PT', 'Part-Time');

