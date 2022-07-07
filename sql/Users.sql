--DROP DB IF EXISTS
DROP DATABASE IF EXISTS JobPortal;

--CREATE DB IF NOT EXISTS
CREATE DATABASE IF NOT EXISTS JobPortal;

--USE JobPortal DATABASE
USE JobPortal;

--CREATE TABLE USERS
CREATE TABLE Users (
  UserID int(11) NOT NULL AUTO_INCREMENT,
  Fname varchar(50) NOT NULL,
  Lname varchar(50) DEFAULT NULL,
  Email varchar(50) NOT NULL,
  Phone int(15) NOT NULL,
  Password varchar(50) NOT NULL,
  Role varchar(6) NOT NULL,
  PRIMARY KEY ( UserID ),
  UNIQUE KEY  Email  ( Email )
) ENGINE=InnoDB

