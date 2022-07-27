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
 JobDescription VARCHAR(1000) NOT NULL,
 Duty VARCHAR(1000),
 Qualification VARCHAR(1000),
 Benefits VARCHAR(800),
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


-- insert two fake user for testing purpose
-- pass: Aaa1234@
INSERT INTO Users (Fname, Lname, Email, Phone, Password, Role, Agreement)
VALUES ('Jojo','Weng','wengj4@student.douglascollege.ca','2361231234','$2y$10$.h5F6xiIMqJQabpNOirYVuufISzwF60u2GusEh6peEjX2jaqPbFXa','Admin',1);
-- pass: Aaa2234@
INSERT INTO Users (Fname, Lname, Email, Phone, Password, Role, Agreement)
VALUES ('Amy','LaRoy','amylaroy@douglascollege.ca','2451001000','$2y$10$wrcO2atixWgtlY2rWr3/neBGFoNvRAvzNCSymDVtc66DP/fU13dye','User',1);


-- insert some data for jobs
INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES('Vancouver, BC', 'IT','FT','Software Engineer Full Stack Entry Level',4300,'You will work across the stack and have the opportunity to develop new infrastructure that our customers will use to manage their operations and fleet of assets. As a vertically integrated hardware/software solution that is deployable worldwide, our product presents unique challenges including IOT, cloud, security, firmware, billing, analytics, iOS/Android apps, etc. As an early member of our engineering team, you''ll have many opportunities to forge our best practices, technical decisions, and create areas of ownership for yourself.','
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
VALUES ('Burnaby, BC','IT','FT','Entry-Level Software Developer',4000,'As an entry level software developer, you will work in a collaborative environment where you will play a key role in designing, developing, testing, maintaining, and delivering customized mission-critical solutions to our clients.',' Maintaining existing applications for current clients<br>
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
VALUES ('Vancouver, BC', 'IT','PT','Software Testing Engineer',6000,'As a Software Engineer in Test you will work as part of the Quality team responsible for delivering an enterprise class NetApp software product. Through the application of systematic test tools and processes you will help deliver reliable, innovative storage and data management products. You will be part of a team that develops, modifies, and executes automated software test plans; analyzes and writes test standards and procedures; maintains documentation of results; and works closely with development engineers in feature development and resolution of problems.','As a software engineer you would participate in product design, development, verification, troubleshooting, and delivery of a system or major subsystems. This position requires an individual to be creative, team-oriented, technology savvy, driven to produce results and demonstrates the ability to take a cross-team leadership role.',
'Experience with multiple programming languages is a benefit but there is also room to improve your skills.<br>
Most entry-level engineers have a level of proficiency in: C, C++, Java and/or Python<br>
Projects, experiences, or coursework related to areas such as: Operating Systems, Computer Architecture, Multi-Threading, Data Structures & Algorithms<br>
Proven aptitude for learning new technologies<br>
Creative and analytical approach problem solving skills<br>
Strong oral and written communication is necessary for success<br>
Ability to work on a diverse team or with a diverse range of people.<br>','','NetApp','2022-07-21');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Vancouver, BC','IT','FT','Full Stack Software Engineer',3500,'Forsta is looking for experienced Python engineers who love to build and deliver great products to the market. We are building our next generation of products and we want them to be beautiful, functional and interactive.','','
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
VALUES ('Vancouver, BC','IT','FT','Full Stack Software Engineering',5000,'You will work in a Scrum team of around seven members using C#, ASP.NET and SQL Server technologies. Experience with these, or other web technologies, as well as an undergraduate degree or diploma in Computer Science, Electrical/Computer Engineering or Engineering Physics are desired. Some background in physics, chemistry, materials science or electronics would be great, but not required.','Our daily work includes designing and developing new features for our software, interacting with interesting clients to determine their requirements and configuring and customizing our software to meet those requirements. Our software is developed with a high degree of professionalism and a strong aesthetic sense. We encourage direct communication between developers and our clients.

If this resonates with you, we''d love to talk with you.','Software Development Occupations: 1 year (preferred)','
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

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Richmond, BC','MT','FT','WonderFi Software Project Coordinator Intern', 3500,
'We''re looking for a passionate and organized student who wants to explore an exciting opportunity to dive into the world of cryptocurrency and gain extensive experience managing teams and projects. In this role, you will be expected to communicate with multiple stakeholders and leaders at the company. You will also be expected to use tools such as the Agile methodology, SCRUM practices and Jira Software Management to manage and keep track of projects and their progress.',
'Participate in Software development to build high quality and scalable infrastructure.<br>
Participate in research, design, development, testing and documenting blockchain technologies.<br>
Help develop interactive interfaces for decentralized applications (dApps).<br>
Take on a leadership role to help delegate project tasks to teams best suited for completing them.<br>',
'Communication skills, both written and verbal<br>
&#8226; Delegating project tasks to teams best suited for completing them<br>
&#8226; Working with stakeholders such as the Product team to detail specific project deliverables<br>
&#8226; Working with stakeholders like the Customer Success team or the Marketing team on creating tasks or bug tickets for the Engineering teams<br>
&#8226; Tracking progress and providing regular reports on project status to project team and key stakeholders<br>',
'Competitive salary<br>
 Dental and vision care<br>
 Flexible schedule<br>',
 'BiTbyte Tech Inc.','2022-06-29');

 INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Burnaby, BC','MT','FT','Project Manager (Traffic)', 6500,'You love working in a team to see projects through from start to finish, and you''re a proactive problem solver who doesn''t let a project hiccup slow you down. You have progressive experience working on project teams and place a high importance on quality work.<br>
  As a Project Manager, you will report to our Traffic Division Manager, and work alongside a tight-knit team of approximately 11 staff. You will interact with a wide variety of clients and oversee the delivery of a portfolio of traffic engineering services. You will manage design projects for both private and public clients, and collaborate with members of the Traffic team, as well as many other parts of the business. Projects can range from stand-alone traffic assignments to providing support on major infrastructure projects, and everything in between.','
    Engaging in active business development<br>
    Acting as the key contact on projects working with clients, stakeholders, consultants, contractors, and support staff<br>
    Preparing proposals and reports in coordination with our proposal team and senior staff<br>
    Developing project schedules and coordinating resources<br>
    Monitoring budget and progress on projects<br>
    Providing guidance to the internal project team<br>',
    '
    Engaging in active business development<br>
    Acting as the key contact on projects working with clients, stakeholders, consultants, contractors, and support staff<br>
    Preparing proposals and reports in coordination with our proposal team and senior staff<br>
    Developing project schedules and coordinating resources<br>
    Monitoring budget and progress on projects<br>
    Providing guidance to the internal project team<br>',
'People come first. We support you with the education, mentoring, and growth opportunities you need to build an interesting career. As an employee-owned firm, we create a clear internal growth path that can keep up with even the most ambitious professionals. We are connected from our field staff to each of our six offices and we support communication between all staff, and across all divisions. You''ll be well connected to the rest of Binnie via phone, video conferencing, and our popular intranet. Whether it''s joining a book club, or writing about your experience in the field, everyone can get involved in their own way.',
'Binnie',
'2022-05-15');

 INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Vancouver, BC','MT','FT','Project Manager',5500,'We are looking for a Project Manager who will provide our clients and colleagues with a proactive, strategic, measurable and organized approach to holistic marketing strategies and product implementation. This role partners project management, business analysis skills, and effective communication skills to ensure that the necessary information of a project is delivered to the key stakeholders while keeping projects moving and within scope. The Project Manager works with internal teams to manage deliverables, but also owns client relationships providing excellent client service throughout every stage of work. This position would be part of our Project Delivery Team, and reports to our Director of Project Delivery.',
 'Collaborate with all VERB Internal departments on key projects and process efficiency including, Discovery, Design, Marketing, Development, QA, and IT Operations<br>
Work closely with projects and the Account Directors to ensure total service delivery excellence in meeting deadlines, budgets, and quality assurance
Create and maintain project schedules, internal and external status reports, risk and issues logs.<br>
Act as the project expert/product owner who has an intimate understanding of the entire solution.<br>
Plan and facilitate client workshops and requirements gathering meetings.<br>
Define and prioritize requirements for web projects using various needs analysis techniques.<br>
Craft requirements documents with technical specifications, functionalities, and/or user stories.<br>
Translates conceptual ideas into technically feasible CMS web solutions.<br>
Administrator and/or build new web pages, make changes to existing modules, implement modules/widgets/content templates, research new modules or enhancements within Wordpress and/or Drupal Content Management Systems.<br>
Oversee the implementation of campaigns for clients, this may be small, one-off social media campaigns or large-scale integrated marketing campaigns.<br>
Working closely with the Project Delivery Team, there will be the opportunity to help shape processes used throughout the organization.<br>',
'
    Must possess at least 2 years of experience with project management responsibilities
    Bachelor''s degree/equivalent in business administration or related field (or equivalent experience)
    Experience implementing Agile project management methodologies
    Experience developing requirements, use cases, user stories, etc
    Experience working with a Content Management System (CMS) within an agency setting (Wordpress and Drupal)
    Knowledge of project delivery processes, including Discover, Definition, Design, Develop, Deploy
    Willingness and attitude to help project teams find workable and pragmatic solutions
    Superb verbal and written communication skills
    Excellent organizational and prioritization',
    ' Our benefits are anything but basic, with vacation time available on day one (not to mention an extra bonus week during the holidays), an annual travel credit (for non-work related travel), and free office snacks and drinks to keep you energized when you''re around.
In addition, we offer the following and are consistently looking for new ways to enhance the benefits we offer to our team:<br>
&#8226;100% premium share option for Group Health Insurance (medical, dental, vision), with a health spending account to top up your claims<br>
&#8226;A healthy living account<br>
&#8226;Company matching RRSP program<br>
&#8226;Top up for Parental/Pregnancy leave<br>
&#8226;Remote and flexible work arrangements<br>
&#8226;Transit and fitness discounts<br>
&#8226;Recreational sports teams<br>
&#8226;Learning and development opportunities with a multitude of resources<br>
&#8226;Internal recognition programs',
'VERB Interactive','2022-07-20');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Vancouver, BC','MT','FT','IT Project Management Specialist (SDLC)',4500,'A master organizer and communicator with an eagle eye for detail and a talent for delivering value to clients in the most efficient way possible. Your superpower Helping organizations perform better and achieve their goals through project management activities-plans, estimates, scope, and requirements, from kickoff to rollout. You''re a pragmatist who''s always ready to take the helm on technology projects. You bring creativity and flexibility to your game, and you''re a natural at building an atmosphere of trust, openness, and communication so partners work well together on shared objectives. Negotiating and time-management skills You have both in spades, along with a gift for getting diverse stakeholders on the same page when it comes to priorities and direction.',
 'Have overall accountability to lead and implement quality projects while meeting cost, schedule and scope using Agile Methodologies and tools.<br>
Direct large-scale, complex projects often involving multiple internal and external constituents and matrix partners.<br>
Monitors and controls the project.<br>
Process recommendations and adjustments to the Accountable Executive and publishes periodic project status reports.<br>',
' 3 years'' experience with end-to-end solution delivery in software/IT Projects such as applications development, software upgrades, and systems integration.<br>
Full software development life cycle (SDLC) Experience working directly with developers.<br>
Financial management skills in developing and tracking project budget & P&L.<br>
Hands on experience with project management tools such as MS Project, and project management methodologies (margins, budget, timelines, scope, and quality to make better business decisions).<br>
Bachelor''s degree or equivalent.',
'','Accenture','2022-07-20');