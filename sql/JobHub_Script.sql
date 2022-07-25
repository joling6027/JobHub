DROP DATABASE IF EXISTS JobHub;

CREATE DATABASE IF NOT EXISTS JobHub;

USE JobHub;

DROP TABLE IF EXISTS Users;

CREATE TABLE Users (
  UserID INT NOT NULL AUTO_INCREMENT,
  Fname VARCHAR(50) NOT NULL,
  Lname VARCHAR(50) DEFAULT NULL,
  Email VARCHAR(50) NOT NULL UNIQUE,
  Phone VARCHAR(20) NOT NULL,
  Password VARCHAR(500) NOT NULL,
  Role CHAR(6) NOT NULL,
  Agreement TINYINT(1) NOT NULL,
  PRIMARY KEY ( UserID )
)ENGINE=InnoDB;

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



-- insert some data for jobs
INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES('Vancouver,BC', 'IT','FT','Software Engineer Full Stack Entry Level',4300,'You will work across the stack and have the opportunity to develop new infrastructure that our customers will use to manage their operations and fleet of assets. As a vertically integrated hardware/software solution that is deployable worldwide, our product presents unique challenges including IOT, cloud, security, firmware, billing, analytics, iOS/Android apps, etc. As an early member of our engineering team, you''ll have many opportunities to forge our best practices, technical decisions, and create areas of ownership for yourself.','
    Write code. Our languages and frameworks include Groovy/Grails, Java, JS/Node.js/AngularJS, C++, Python, PostgreSQL and others.<br>
    Architect your own features. </br>Engineers at Keycafe are given wide latitude on how to approach problems, but be ready for technical feedback.<br>
    Collaborate with product management and other teams to achieve customer experience objectives.<br>
    Own the quality of the features you develop including comprehensive testing and documentation.<br>
','Bachelor''s degree in Computer Science or Sofware Engineering<br>
Experience with object oriented programming languages and APIs<br>
Ability to work within a team and accept technical feedback','
    Competitive salary<br>
    Benefits plan<br>
    Generous and flexible paid time off<br>
    Parental leave policy<br>
    Remote-friendly work environment<br>
','HastingCafe','2022-07-23');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Burnaby,BC','IT','FT','Entry-Level Software Developer',4000,'As an entry level software developer, you will work in a collaborative environment where you will play a key role in designing, developing, testing, maintaining, and delivering customized mission-critical solutions to our clients.',' Maintaining existing applications for current clients<br>
Constantly improving skills set and sharing new knowledge with others on the team<br>
Design, develop, document, test and debug complex and large-scale applications<br>
Participate in the full software development life cycle<br>
Analyze code to find causes of errors and revise the applications as needed<br>
Participate in software design meetings to analyze and determine user needs are met with technical requirements<br>
Work collaboratively with development teams to design and implement product features to meet delivery dates<br>',
'Bachelors or Masters degree in computer science or related field<br>
Must have an interest in and willingness to learn diverse technologies<br>
Strong understanding of Object-Oriented Software Design and Development concepts<br>
Java or .NET programming experience developing web-based applications<br>
Familiarity with software development lifecycle and design patterns<br>
Experience with object-oriented design and related tools (UML, Rational)<br>
Experience with MS SQL Server, or database design a plus<br>',
'
    A flexible work environment that includes hybridized locations.<br>
    Market based compensation with a full range of benefits including medical, dental, vision, RRSP, and DPSP.<br>
    A culture that promotes and fosters career growth through professional training and mentoring.<br>
    An employee wellness program that includes free access to professional fitness coaches, structured dietary/nutrition plans, and events that range from 5k''s to triathlons.<br>
    Opportunities to give back to the community through our RedMane Community Impact Team which organizes events like Feed My Starving Children, Toy Drives, and other charitable activities.<br>
','RedMane Technology','2022-07-10');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Vancouver,BC', 'IT','PT','Software Testing Engineer',6000,'As a Software Engineer in Test you will work as part of the Quality team responsible for delivering an enterprise class NetApp software product. Through the application of systematic test tools and processes you will help deliver reliable, innovative storage and data management products. You will be part of a team that develops, modifies, and executes automated software test plans; analyzes and writes test standards and procedures; maintains documentation of results; and works closely with development engineers in feature development and resolution of problems.','As a software engineer you would participate in product design, development, verification, troubleshooting, and delivery of a system or major subsystems. This position requires an individual to be creative, team-oriented, technology savvy, driven to produce results and demonstrates the ability to take a cross-team leadership role.',
'Experience with multiple programming languages is a benefit but there is also room to improve your skills.<br>
Most entry-level engineers have a level of proficiency in: C, C++, Java and/or Python<br>
Projects, experiences, or coursework related to areas such as: Operating Systems, Computer Architecture, Multi-Threading, Data Structures & Algorithms<br>
Proven aptitude for learning new technologies<br>
Creative and analytical approach problem solving skills<br>
Strong oral and written communication is necessary for success<br>
Ability to work on a diverse team or with a diverse range of people.<br>','','NetApp','2022-07-21');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Vancouver,BC','IT','FT','Full Stack Software Engineer',3500,'Forsta is looking for experienced Python engineers who love to build and deliver great products to the market. We are building our next generation of products and we want them to be beautiful, functional and interactive.','','
    1+ years industry experience developing applications using Python<br>
    1+ year experience with JavaScript/React<br>
    Experience developing Rest API''s using Flask/Django frameworks will be advantage<br>
    Experience working with SQL Databases such as Postgres/ MySQL will be advantage<br>
    Knowledge of cloud infrastructure using AWS or Azure<br>
    Experience/interest in C#.NET will be helpful<br>',' Competitive salary and benefits package<br>
Secure employment, average R&D tenure is 5+ years.<br>
Local team with access to a larger developer community.<br>
Casual work atmosphere, flexible work schedules, and a great team<br>',
'Forsta','2022-07-24');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Vancouver,BC','IT','FT','Full Stack Software Engineering',5000,'You will work in a Scrum team of around seven members using C#, ASP.NET and SQL Server technologies. Experience with these, or other web technologies, as well as an undergraduate degree or diploma in Computer Science, Electrical/Computer Engineering or Engineering Physics are desired. Some background in physics, chemistry, materials science or electronics would be great, but not required.','Our daily work includes designing and developing new features for our software, interacting with interesting clients to determine their requirements and configuring and customizing our software to meet those requirements. Our software is developed with a high degree of professionalism and a strong aesthetic sense. We encourage direct communication between developers and our clients.

If this resonates with you, we’d love to talk with you.','Software Development Occupations: 1 year (preferred)','
    Casual dress
    Dental care
    Disability insurance
    Extended health care
    Flexible schedule
    Life insurance
    On-site gym
    On-site parking
    Vision care
','Quartz Imaging Corporation','2022-06-30');