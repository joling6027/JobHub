--DROP DB IF EXISTS
DROP DATABASE IF EXISTS JobHub;

--CREATE DB IF NOT EXISTS
CREATE DATABASE IF NOT EXISTS JobHub;

--USE JobPortal DATABASE
USE JobHub;

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
) ENGINE=InnoDB


 