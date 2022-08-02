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
 CONSTRAINT job_applied_ibfk_2 FOREIGN KEY (JobID) REFERENCES jobs (JobID) ON DELETE CASCADE ON UPDATE CASCADE
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
VALUES ('Jaspal','Singh','singhj137@student.douglascollege.ca','2361231234','$2y$10$.h5F6xiIMqJQabpNOirYVuufISzwF60u2GusEh6peEjX2jaqPbFXa','Admin',1);

-- pass: Aaa1234@
INSERT INTO Users (Fname, Lname, Email, Phone, Password, Role, Agreement)
VALUES ('Jaspal','Singh','jaspal@gmail.com','2361231234','$2y$10$.h5F6xiIMqJQabpNOirYVuufISzwF60u2GusEh6peEjX2jaqPbFXa','User',1);

-- pass: Aaa1234@
INSERT INTO Users (Fname, Lname, Email, Phone, Password, Role, Agreement)
VALUES ('Jojo','Weng','wengj4@student.douglascollege.ca','2361231234','$2y$10$.h5F6xiIMqJQabpNOirYVuufISzwF60u2GusEh6peEjX2jaqPbFXa','Admin',1);

-- pass: Aaa2234@
INSERT INTO Users (Fname, Lname, Email, Phone, Password, Role, Agreement)
VALUES ('Amy','LaRoy','amylaroy@douglascollege.ca','2451001000','$2y$10$wrcO2atixWgtlY2rWr3/neBGFoNvRAvzNCSymDVtc66DP/fU13dye','User',1);


-- insert some data for jobs
INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES('Vancouver, BC', 'IT','FT','Software Engineer Full Stack Entry Level',4300,
'You will work across the stack and have the opportunity to develop new infrastructure that our customers will use to manage their operations and fleet of assets. As a vertically integrated hardware/software solution that is deployable worldwide, our product presents unique challenges including IOT, cloud, security, firmware, billing, analytics, iOS/Android apps, etc. As an early member of our engineering team, you''ll have many opportunities to forge our best practices, technical decisions, and create areas of ownership for yourself.',
'- Write code. Our languages and frameworks include Groovy/Grails, Java, JS/Node.js/AngularJS, C++, Python, PostgreSQL and others. 
- Architect your own features. 
- Engineers at Keycafe are given wide latitude on how to approach problems, but be ready for technical feedback. 
- Collaborate with product management and other teams to achieve customer experience objectives. 
- Own the quality of the features you develop including comprehensive testing and documentation.',
'- Bachelor''s degree in Computer Science or Sofware Engineering.  
- Experience with object oriented programming languages and APIs.  
- Ability to work within a team and accept technical feedback.',
'- Competitive salary 
- Benefits plan 
- Generous and flexible paid time off 
- Parental leave policy 
- Remote-friendly work environment','HastingCafe','2022-07-23');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Burnaby, BC','IT','FT','Entry-Level Software Developer',4000,'As an entry level software developer, you will work in a collaborative environment where you will play a key role in designing, developing, testing, maintaining, and delivering customized mission-critical solutions to our clients.','- Maintaining existing applications for current clients. 
- Constantly improving skills set and sharing new knowledge with others on the team. 
- Design, develop, document, test and debug complex and large-scale applications. 
- Participate in the full software development life cycle. 
- Analyze code to find causes of errors and revise the applications as needed. 
- Participate in software design meetings to analyze and determine user needs are met with technical requirements. 
- Work collaboratively with development teams to design and implement product features to meet delivery dates.',
'- Bachelors or Masters degree in computer science or related field.  
- Must have an interest in and willingness to learn diverse technologies.   
- Strong understanding of Object-Oriented Software Design and Development concepts. 
- Java or .NET programming experience developing web-based applications.  
- Familiarity with software development lifecycle and design patterns.  
- Experience with object-oriented design and related tools (UML, Rational).  
- Experience with MS SQL Server or database design is a plus',
'- A flexible work environment that includes hybridized locations.  
- Market based compensation with a full range of benefits including medical,dental,vision,RRSP and DPSP. 
- A culture that promotes and fosters career growth through professional training and mentoring.  
- An employee wellness program that includes free access to professional fitness coaches, structured dietary/nutrition plans, and events that range from 5k''s to triathlons. 
- Opportunities to give back to the community through our RedMane Community Impact Team which organizes events like Feed My Starving Children, Toy Drives and other charitable activities. 
','RedMane Technology','2022-07-10');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Vancouver, BC', 'IT','PT','Software Testing Engineer',6000,'As a Software Engineer in Test you will work as part of the Quality team responsible for delivering an enterprise class NetApp software product. Through the application of systematic test tools and processes you will help deliver reliable, innovative storage and data management products. You will be part of a team that develops, modifies, and executes automated software test plans; analyzes and writes test standards and procedures; maintains documentation of results; and works closely with development engineers in feature development and resolution of problems.','As a software engineer you would participate in product design, development, verification, troubleshooting, and delivery of a system or major subsystems. This position requires an individual to be creative, team-oriented, technology savvy, driven to produce results and demonstrates the ability to take a cross-team leadership role.',
'- Experience with multiple programming languages is a benefit but there is also room to improve your skills. 
- Most entry-level engineers have a level of proficiency in: C, C++, Java and/or Python. 
- Projects, experiences, or coursework related to areas such as: Operating Systems, Computer Architecture, Multi-Threading, Data Structures & Algorithms. 
- Proven aptitude for learning new technologies. 
- Creative and analytical approach problem solving skills. 
- Strong oral and written communication is necessary for success. 
- Ability to work on a diverse team or with a diverse range of people','','NetApp','2022-07-21');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Vancouver, BC','IT','FT','Full Stack Software Engineer',3500,
'Forsta is looking for experienced Python engineers who love to build and deliver great products to the market. We are building our next generation of products and we want them to be beautiful, functional and interactive.','','
- 1+ years industry experience developing applications using Python 
- 1+ year experience with JavaScript/React 
- Experience developing Rest API''s using Flask/Django frameworks will be advantage 
- Experience working with SQL Databases such as Postgres/ MySQL will be advantage 
- Knowledge of cloud infrastructure using AWS or Azure 
- Experience/interest in C#.NET will be helpful',
'- Competitive salary and benefits package. 
- Secure employment, average R&D tenure is 5+ years. 
- Local team with access to a larger developer community. 
- Casual work atmosphere, flexible work schedules, and a great team.',
'Forsta','2022-07-24');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Vancouver, BC','IT','FT','Full Stack Software Engineering',5000,'You will work in a Scrum team of around seven members using C#, ASP.NET and SQL Server technologies. Experience with these, or other web technologies, as well as an undergraduate degree or diploma in Computer Science, Electrical/Computer Engineering or Engineering Physics are desired. Some background in physics, chemistry, materials science or electronics would be great, but not required.','Our daily work includes designing and developing new features for our software, interacting with interesting clients to determine their requirements and configuring and customizing our software to meet those requirements. Our software is developed with a high degree of professionalism and a strong aesthetic sense. We encourage direct communication between developers and our clients. 
If this resonates with you, we''d love to talk with you.','Software Development Occupations: 1 year (preferred)',
'- Casual dress 
- Dental care 
- Disability insurance 
- Extended health care 
- Flexible schedule 
- Life insurance 
- On-site gym 
- On-site parking 
- Vision care ','Quartz Imaging Corporation','2022-06-30');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
VALUES ('Richmond, BC','MT','FT','WonderFi Software Project Coordinator Intern', 3500,
'We''re looking for a passionate and organized student who wants to explore an exciting opportunity to dive into the world of cryptocurrency and gain extensive experience managing teams and projects. In this role, you will be expected to communicate with multiple stakeholders and leaders at the company. You will also be expected to use tools such as the Agile methodology, SCRUM practices and Jira Software Management to manage and keep track of projects and their progress. ',
'Participate in Software development to build high quality and scalable infrastructure. 
Participate in research, design, development, testing and documenting blockchain technologies. 
Help develop interactive interfaces for decentralized applications (dApps). 
Take on a leadership role to help delegate project tasks to teams best suited for completing them. ',
'- Communication skills, both written and verbal 
- Delegating project tasks to teams best suited for completing them 
- Working with stakeholders such as the Product team to detail specific project deliverables 
- Working with stakeholders like the Customer Success team or the Marketing team on creating tasks or bug tickets for the Engineering teams 
- Tracking progress and providing regular reports on project status to project team and key stakeholders<br>',
'- Competitive salary 
 - Dental and vision care 
 - Flexible schedule ',
 'BiTbyte Tech Inc.','2022-06-29');

 INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Burnaby, BC','MT','FT','Project Manager (Traffic)', 6500,'You love working in a team to see projects through from start to finish, and you''re a proactive problem solver who doesn''t let a project hiccup slow you down. You have progressive experience working on project teams and place a high importance on quality work. 
 As a Project Manager, you will report to our Traffic Division Manager, and work alongside a tight-knit team of approximately 11 staff. You will interact with a wide variety of clients and oversee the delivery of a portfolio of traffic engineering services. You will manage design projects for both private and public clients, and collaborate with members of the Traffic team, as well as many other parts of the business. Projects can range from stand-alone traffic assignments to providing support on major infrastructure projects, and everything in between. ',
 '- Engaging in active business development. 
- Acting as the key contact on projects working with clients, stakeholders, consultants, contractors, and support staff. 
- Preparing proposals and reports in coordination with our proposal team and senior staff. 
- Developing project schedules and coordinating resources. 
- Monitoring budget and progress on projects. 
- Providing guidance to the internal project team. ',
'- Engaging in active business development. 
- Acting as the key contact on projects working with clients, stakeholders, consultants, contractors, and support staff. 
- Preparing proposals and reports in coordination with our proposal team and senior staff. 
- Developing project schedules and coordinating resources. 
- Monitoring budget and progress on projects. 
- Providing guidance to the internal project team. ',
'People come first. We support you with the education, mentoring, and growth opportunities you need to build an interesting career. As an employee-owned firm, we create a clear internal growth path that can keep up with even the most ambitious professionals. We are connected from our field staff to each of our six offices and we support communication between all staff, and across all divisions. You''ll be well connected to the rest of Binnie via phone, video conferencing, and our popular intranet. Whether it''s joining a book club, or writing about your experience in the field, everyone can get involved in their own way.',
'Binnie','2022-05-15');

 INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Vancouver, BC','MT','FT','Project Manager',5500,
 'We are looking for a Project Manager who will provide our clients and colleagues with a proactive, strategic, measurable and organized approach to holistic marketing strategies and product implementation. This role partners project management, business analysis skills, and effective communication skills to ensure that the necessary information of a project is delivered to the key stakeholders while keeping projects moving and within scope. The Project Manager works with internal teams to manage deliverables, but also owns client relationships providing excellent client service throughout every stage of work. This position would be part of our Project Delivery Team, and reports to our Director of Project Delivery.',
 'Collaborate with all VERB Internal departments on key projects and process efficiency including, Discovery, Design, Marketing, Development, QA, and IT Operations. 
Work closely with projects and the Account Directors to ensure total service delivery excellence in meeting deadlines, budgets, and quality assurance.
Create and maintain project schedules, internal and external status reports, risk and issues logs. 
Act as the project expert/product owner who has an intimate understanding of the entire solution. 
Plan and facilitate client workshops and requirements gathering meetings. 
Define and prioritize requirements for web projects using various needs analysis techniques. 
Craft requirements documents with technical specifications, functionalities, and/or user stories. 
Translates conceptual ideas into technically feasible CMS web solutions. 
Working closely with the Project Delivery Team, there will be the opportunity to help shape processes used throughout the organization. ',
'- Must possess at least 2 years of experience with project management responsibilities.
- Bachelor''s degree/equivalent in business administration or related field (or equivalent experience)
- Experience implementing Agile project management methodologies
- Experience developing requirements, use cases, user stories, etc
- Experience working with a Content Management System (CMS) within an agency setting (Wordpress and Drupal)
- Knowledge of project delivery processes, including Discover, Definition, Design, Develop, Deploy
- Willingness and attitude to help project teams find workable and pragmatic solutions
- Superb verbal and written communication skills
- Excellent organizational and prioritization',
'Our benefits are anything but basic, with vacation time available on day one (not to mention an extra bonus week during the holidays), an annual travel credit (for non-work related travel), and free office snacks and drinks to keep you energized when you''re around.
In addition, we offer the following and are consistently looking for new ways to enhance the benefits we offer to our team: 

- 100% premium share option for Group Health Insurance (medical, dental, vision), with a health spending account to top up your claims
- A healthy living account
- Company matching RRSP program
- Top up for Parental/Pregnancy leave
- Remote and flexible work arrangements
- Transit and fitness discounts
- Recreational sports teams
- Learning and development opportunities with a multitude of resources',
'VERB Interactive','2022-07-20');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Vancouver, BC','MT','FT','IT Project Management Specialist (SDLC)',4500,
 'A master organizer and communicator with an eagle eye for detail and a talent for delivering value to clients in the most efficient way possible. Your superpower Helping organizations perform better and achieve their goals through project management activities-plans, estimates, scope, and requirements, from kickoff to rollout. You''re a pragmatist who''s always ready to take the helm on technology projects. You bring creativity and flexibility to your game, and you''re a natural at building an atmosphere of trust, openness, and communication so partners work well together on shared objectives. Negotiating and time-management skills You have both in spades, along with a gift for getting diverse stakeholders on the same page when it comes to priorities and direction.',
 '- Have overall accountability to lead and implement quality projects while meeting cost, schedule and scope using Agile Methodologies and tools.
- Direct large-scale, complex projects often involving multiple internal and external constituents and matrix partners.
- Monitors and controls the project. 
- Process recommendations and adjustments to the Accountable Executive and publishes periodic project status reports. ',
'- 3 years'' experience with end-to-end solution delivery in software/IT Projects such as applications development, software upgrades, and systems integration.
- Full software development life cycle (SDLC) Experience working directly with developers.
- Financial management skills in developing and tracking project budget & P&L.
- Hands on experience with project management tools such as MS Project, and project management methodologies (margins, budget, timelines, scope, and quality to make better business decisions).
- Bachelor''s degree or equivalent.',
'','Accenture','2022-07-20');

INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Vancouver, BC','LB','PT','Cashiers (Specifically Sunday Schedule) Walmart',1100,
 'Our Customer Experience associates interact with every single one of our customers, acting as the warm smile and the helping hand that we pride ourselves on being. It is up to our incredible team to present Walmart’s values to everyone who walks through our doors. We have many opportunities in our Customer Experience teams, including: - Cashier - People-Greeter - Self-Checkout Attendants - Stockperson - Customer Service Manager - Customer Experience Salesfloor Associate Qualifications: - A great attitude and willingness to learn - Some basic math skills, but nothing too scary - Willingness to help solve problems We proudly offer access to benefits for part-time and part-time flex associates. Our part time flex roles provide flexibility of more hours or less hours when needed. Whether you are looking for opportunities to grow your career long-term, or simply seeking a great place to work part-time, this is that place.',
 '',
 'Age - 16 or older ',
 '- 10% off on every purchase after completing training period
  - 20% off on every purchase on associate appreciation days
  - Part Time and Full-time medical insurance',
 'Walmart Canada',
 '2022-07-20'
 );

 INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('New Westminster, BC','LB','PT','(CAN) CAP 3 Associate', 1280,
 'To provide customer service by performing assigned duties related to receiving merchandise and moving it to the sales floor. This will be accomplished by unloading trailers, moving pallets into the sales area and assisting in the processing of merchandise in a clean and safe environment. This associate will work as a member of a team to strategically plan and execute tasks based on workload and operational functions',
 '',
 'Age - 16 or older ',
 '- 10% off on every purchase after completing training period
  - 20% off on every purchase on associate appreciation days
  - Part Time and Full-time medical insurance',
 'Walmart Canada',
 '2022-07-25'
 );

  INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Langley, BC','LB','PT','Guest Service Attendant', 1200,
 'Are you looking to get out of the house for just 2 or 3 days a week? Need a break from the kids? Need extra income while you go to school? We are hiring for several positions in Langley. All shifts are 6-8 hour shifts. Email your resume or drop in in person to set up an initial interview. Benefits available after 6 months, and a $250 signing bonus is available after 12 months for those that work 20 hours/week or more on the average.',
 '',
 'Age - 16 or older ',
 '- Extended health care',
 'Petro Canada Gas Station',
 '2022-07-23'
 );

 INSERT INTO Jobs (JobLocation, JobCategory, JobType, JobPosition, Salary, JobDescription, Duty, Qualification, Benefits, CompanyName, CreatedOn)
 VALUES ('Burnaby, BC','LB','PT','Produce Associate', 1200,
 'Reporting to the Produce Department Head (or his/her delegates), this position is responsible for preparing various produce products in advance for customers to choose from. The position also needs to stock produce onto the display cases in the sales area, follow FIFO concept, provide good customer service to our customers by fulfilling their requests, and maintain inventory and workplace cleanliness ',
 '- Maintain inventory and product freshness following FIFO concept; ensure full display of various produce products
  - Preform regular quality check, follow procedures to process sub-standard products and manage shrinkage 
  - Prepare various produce for sales activities, include but not limited to sort, cut, wash, weigh, pack and label various produce products and display them in the display cases 
  - Greet customers with good customer service, smiles, being friendly and enthusiasm
  - Assist customers in produce product selection and provide recommendations as required
  - Maintain workplace cleanliness by washing and maintain relevant work tools clean and well-kept
  - Keep display cases and walk-in coolers clean and tidy',
 'Age - 16 or older ',
 '- Staff purchase discount
  - Paid annual leave, sick leave, marriage leave and bereavement leave
  - Discounted staff meals
  - Life and AD&D Insurance',
 'T&T Supermarket',
 '2022-07-29'
 );
 