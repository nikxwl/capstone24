DROP TABLE IF EXISTS answers;

CREATE TABLE `answers` (
  `answer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `alumni_ID` int(11) NOT NULL,
  `r_12` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `honor` varchar(255) NOT NULL,
  `r_13` int(11) NOT NULL,
  `examination` varchar(255) NOT NULL,
  `date_taken` varchar(255) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `r_14` int(11) NOT NULL,
  `undergraduate` text NOT NULL,
  `graduate` text NOT NULL,
  `r_14_others` varchar(255) NOT NULL,
  `r_15` int(11) NOT NULL,
  `training_title` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `training_institution` varchar(255) NOT NULL,
  `r_15_2` int(11) NOT NULL,
  `r_15_2_others` varchar(255) NOT NULL,
  `pursue_studies` varchar(255) NOT NULL,
  `r_16` int(11) NOT NULL,
  `presently_employed` varchar(15) NOT NULL,
  `r_17` int(11) NOT NULL,
  `unemployed_reason` varchar(255) NOT NULL,
  `r_17_others` varchar(255) NOT NULL,
  `r_18` int(11) NOT NULL,
  `employment_status` varchar(20) NOT NULL,
  `r_18_skills` varchar(150) NOT NULL,
  `r_19` int(11) NOT NULL,
  `r_19_answer` varchar(255) NOT NULL,
  `r_20` int(11) NOT NULL,
  `line_of_business` text NOT NULL,
  `r_21` int(11) NOT NULL,
  `place_work` varchar(20) NOT NULL,
  `r_22` int(11) NOT NULL,
  `is_first_job` varchar(20) NOT NULL,
  `r_23` int(11) NOT NULL,
  `staying_job` varchar(255) NOT NULL,
  `r_23_others` varchar(150) NOT NULL,
  `r_24` int(11) NOT NULL,
  `job_related` varchar(10) NOT NULL,
  `r_25` int(11) NOT NULL,
  `accepting_job` varchar(200) NOT NULL,
  `r_25_others` varchar(200) NOT NULL,
  `r_26` int(11) NOT NULL,
  `changing_job` varchar(150) NOT NULL,
  `r_26_others` varchar(200) NOT NULL,
  `r_27` int(11) NOT NULL,
  `job_longevity` varchar(255) NOT NULL,
  `r_27_others` varchar(255) NOT NULL,
  `r_28` int(11) NOT NULL,
  `founding_job` varchar(255) NOT NULL,
  `r_28_others` varchar(255) NOT NULL,
  `r_29` int(11) NOT NULL,
  `job_landing` varchar(150) NOT NULL,
  `r_29_others` varchar(200) NOT NULL,
  `r_30` int(11) NOT NULL,
  `first_job` varchar(255) NOT NULL,
  `current_job` varchar(255) NOT NULL,
  `r_31` int(11) NOT NULL,
  `monthly_earning` varchar(200) NOT NULL,
  `r_32` int(11) NOT NULL,
  `curriculum` varchar(10) NOT NULL,
  `r_33` int(11) NOT NULL,
  `competencies_learned` varchar(200) NOT NULL,
  `r_33_others` varchar(150) NOT NULL,
  `r_34_answer` text NOT NULL,
  `graduate_name` varchar(255) NOT NULL,
  `graduate_address` varchar(255) NOT NULL,
  `graduate_contact` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`answer_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS log_history;

CREATE TABLE `log_history` (
  `log_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_Id` int(11) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `logout_datetime` datetime NOT NULL,
  `logout_remarks` int(11) NOT NULL DEFAULT 0 COMMENT '0=Logged out successfully, 1=Unable to logout last login',
  PRIMARY KEY (`log_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO log_history VALUES("199","66","2024-03-09 19:36:15","2024-03-09 19:38:41","0");
INSERT INTO log_history VALUES("200","72","2024-04-01 22:18:41","2024-04-01 22:20:41","0");
INSERT INTO log_history VALUES("201","90","2024-04-01 22:21:07","2024-04-01 22:29:51","0");
INSERT INTO log_history VALUES("202","72","2024-04-01 22:30:12","2024-04-01 22:31:22","0");
INSERT INTO log_history VALUES("203","90","2024-04-01 22:31:33","2024-04-01 22:32:50","0");
INSERT INTO log_history VALUES("204","72","2024-04-01 22:33:01","2024-04-01 22:43:32","0");
INSERT INTO log_history VALUES("205","90","2024-04-01 22:34:42","0000-00-00 00:00:00","0");
INSERT INTO log_history VALUES("206","72","2024-04-05 22:25:23","2024-04-05 22:33:52","0");
INSERT INTO log_history VALUES("207","66","2024-04-05 22:34:05","0000-00-00 00:00:00","0");



DROP TABLE IF EXISTS question;

CREATE TABLE `question` (
  `quest_ID` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `choice_type` varchar(255) NOT NULL,
  `label` text NOT NULL,
  `order_by` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`quest_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO question VALUES("30","Professional Examination(s) Passed","Textfield/Textarea","","13","2024-02-14 14:48:42");
INSERT INTO question VALUES("31","Educational Attainment (Baccalaureate Degree only)","Textfield/Textarea","","12","2024-02-14 14:48:54");
INSERT INTO question VALUES("32","Reason(s) for taking the course(s) or pursuing degree(s). You may check (✓) more than one answer.","Multiple Answer/Checkboxes","High grades in the course or subject area(s)   related to the course, Good grades in high school, Influence of parents or relatives, Peer Influence, Inspired by a role model, Strong passion for the profession, Prospect for immediate employment, Status or prestige of the profession, Availability of course offering in chosen institution, Prospect of career advancement, Affordable for the family, Prospect of attractive compensation, Opportunity for employment abroad, No particular choice or no better idea","14","2024-02-14 14:48:58");
INSERT INTO question VALUES("33","Please list down all professional or work-related training program(s) including advance studies you \\r\\nhave attended after college. You may use extra sheet if needed.","Textfield/Textarea","","15","2024-02-14 15:01:33");
INSERT INTO question VALUES("34","What made you pursue advance studies? ","Multiple Answer/Checkboxes","For promotion, For professional development","152","2024-02-14 15:02:03");
INSERT INTO question VALUES("35","Are you presently employed?","Single Answer/Radio Button","Yes, No, Never Employed","16","2024-02-14 15:02:41");
INSERT INTO question VALUES("36","Please state reason(s) why you are not yet employed. You may check (✓) more than one answer","Multiple Answer/Checkboxes","Advance or further study, Family concern and decided not to find a job, Health-related reason(s), Lack of work experience, No job opportunity, Did not look for a job","17","2024-02-14 15:03:38");
INSERT INTO question VALUES("37","Present Employment Status","Multiple Answer/Checkboxes","Regular or Permanent, Temporary, Casual, Contractual, Self-employed","18","2024-02-14 15:04:54");
INSERT INTO question VALUES("38","Present occupation (Ex. Grade School Teacher, Electrical Engineer, Self-employed)","Textfield/Textarea","","19","2024-02-14 16:06:07");
INSERT INTO question VALUES("39","Major line of business of the company you are presently employed in. Check one only.","Multiple Answer/Checkboxes","Agriculture, Hunting and Forestry, Fishing, Mining and Quarrying, Manufacturing, Electricity, Gas and Water Supply, Construction, Wholesale and Retail Trade, repair of motor vehicles,   motorcycles and personal and household goods, Hotels and Restaurants, Transport Storage and Communication, Financial Intermediation, Real Estate, Renting and Business Activities, Public Administration and Defense; Compulsory   Social Security, Education, Health and Social Work, Other Community, Social and Personal Service Activities, Private Households with Employed Persons, Extra-territorial Organizations and Bodies","20","2024-02-14 16:07:56");
INSERT INTO question VALUES("40","Place of work","Single Answer/Radio Button","Local, Abroad","21","2024-02-14 16:09:33");
INSERT INTO question VALUES("41","Is this your first job after college?","Single Answer/Radio Button","Yes, No","22","2024-02-14 16:10:01");
INSERT INTO question VALUES("42","What are your reason(s) for staying on the job? You may check (✓) more than one answer.","Multiple Answer/Checkboxes","Salaries and benefits, Career challenge, Related to special skill, Related to course or program of study, Proximity to residence, Peer influence, Family influence","23","2024-02-14 16:10:53");
INSERT INTO question VALUES("43","Is your first job related to the course you took up in college?","Single Answer/Radio Button","Yes, No","24","2024-02-14 16:11:15");
INSERT INTO question VALUES("44","What were your reasons for accepting the job? You may check (✓) more than one answer.","Multiple Answer/Checkboxes","Salaries & benefits, Career challenge, Related to special skills, Proximity to residence","25","2024-02-14 16:11:49");
INSERT INTO question VALUES("46"," How long did you stay in your first job?","Multiple Answer/Checkboxes","Less than a month, 1 to 6 months, 7 to 11 months, 1 year to less than 2 years, 2 years to less than 3 years, 3 years to less than 4 years","27","2024-02-14 16:13:16");
INSERT INTO question VALUES("47","How did you find your first job?","Multiple Answer/Checkboxes","Response to an advertisement, As walk-in applicant, Recommended by someone, Information from friends, Arranged by school’s job placement officer, Family business, Job Fair or Public Employment Service Office (PESO)","28","2024-02-14 16:14:25");
INSERT INTO question VALUES("48","How long did it take you to land your first job?","Single Answer/Radio Button","Less than a month, 1 to 6 months, 7 to 11 months, 1 year to less than 2 years, 2 years to less than 3 years, 3 years to less than 4 years","29","2024-02-14 16:15:19");
INSERT INTO question VALUES("49","Job Level Position","Single Answer/Radio Button","Job Level, Rank or Clerical, Professional Technical or Supervisory, Managerial or Executive, Self-employed","30","2024-02-14 16:16:30");
INSERT INTO question VALUES("50","What is your initial gross monthly earning in your first job after college?","Single Answer/Radio Button","Below P 5000.00, P 5000.00 to less than P 10000.00, P 10000.00 to less than P 15000.00, P 15000.00 to less than P 20000.00, P 20000.00 to less than P 25000.00, P 25000.00 and above","31","2024-02-14 16:17:13");
INSERT INTO question VALUES("51","Was the curriculum you had in college relevant to your first job?","Single Answer/Radio Button","Yes, No","32","2024-02-14 16:17:25");
INSERT INTO question VALUES("52","If YES, what competencies learned in college did you find very useful in your first job? You may \\r\\ncheck (✓) more than one answer.","Multiple Answer/Checkboxes","Communication skills, Human Relations skills, Entrepreneurial skills, Information Technology skills, Problem-solving skills, Critical Thinking skills","33","2024-02-14 16:18:18");
INSERT INTO question VALUES("53","List down suggestions to further improve your course curriculum","Textfield/Textarea","","34","2024-02-14 16:18:26");
INSERT INTO question VALUES("54","What were your reason(s) for changing job? You may check (✓) more than one answer.","Multiple Answer/Checkboxes","Salaries & benefits, Career challenge, Related to special skills, Proximity to residence","26","2024-03-04 00:01:34");
INSERT INTO question VALUES("55","what is love?","Textfield/Textarea","","35","2024-04-01 22:19:37");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `suffix` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `birthplace` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `civilstatus` varchar(20) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `house_no` varchar(50) DEFAULT NULL,
  `street_name` varchar(100) DEFAULT NULL,
  `purok` varchar(50) DEFAULT NULL,
  `zone` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `municipality` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `year_graduated` int(11) DEFAULT NULL,
  `current_job` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 4 COMMENT '0=Admin, 1=Evaluator, 2=Alumni Officer, 3=Department Secretary, 4=Alumni',
  `verification_code` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("66","Admin","Admisndsadsa","Admindasdsadsad","Adminsada","Admin","1998-02-02","26","admin@gmail.com","9359428963","Female","Male","Single","Admin","Iglesia Ni Cristo","Dsas","Admin","Admin","Dsa","Admin","Admin","Dsa","Adminfss","0","","2.jpg","0192023a7bbd73250516f069df18b500","0","254152","2022-11-25 00:00:00");
INSERT INTO users VALUES("72","evaluator","Evaluatorss","Evaluators","Evaluators","Jr","2000-06-06","23","userEvaluators@gmail.com","9359428964","Evaluators","Female","Single","Evaluators","Iglesia Ni Cristo","Evaluators","Evaluators","Evaluators","Evaluators","Evaluators","Evaluators","","Evaluators","0","","2.jpg","0192023a7bbd73250516f069df18b500","1","295016","2022-12-27 00:00:00");
INSERT INTO users VALUES("86","alumniOfficer","SampleSample Sample","Sample Sample Sample","Sample Sample","Sample","2008-02-27","15","adminfdsfsfs@gmail.com","9123456789","Samplef Fsdfsd","Male","Single","Sampleff Fsdfds","Evangelical Christianity","Fdfds Fdsf","Fsfsdfsdds ","Sf Fsdff","Fsdfsdfsdfs Fdsf Sfs","Fdsfd Fsfs Fs","Fdsfds","Fsdffdsf","Sdfsd","0","","2.jpg","0192023a7bbd73250516f069df18b500","2","0","2023-12-18 19:19:29");
INSERT INTO users VALUES("87","DeptSecretary","Lestesd","Leste","Leste","Leste","1986-02-26","37","sonerwin12@gmail.com","9123456789","Leste","Female","Widow/ER","Leste","Iglesia Ni Cristo","Leste","Leste","Leste","Leste","Leste","Leste","","Leste","0","","2.jpg","0192023a7bbd73250516f069df18b500","3","","2023-12-18 19:22:55");
INSERT INTO users VALUES("90","Alumni","Dsaf","Alumniko","Alumniko","Alumniko","1992-01-28","32","Alumniko@gmail.com","9359428964","Alumniko","Female","Single","Alumniko","Hindu","Alumniko","Alumniko","Alumniko","Alumniko","Alumniko","Alumniko","Alumniko","Alumniko","2000","CS","2.jpg","0192023a7bbd73250516f069df18b500","4","","2024-02-01 18:58:19");
INSERT INTO users VALUES("91","Alumni222s","Alumni","Alumni","Alumni","Alumni","1987-02-04","36","sonerwinAlumni8@gmail.com","9359428963","Alumni","Male","Married","Alumni","Judaism","Alumni","Alumni","Alumni","Alumni","Alumni","Alumni","Alumni","Alumni","2001","Engineering","2.jpg","9b511f20893792860cb7dbb5c673855b","4","","2024-02-01 19:59:26");
INSERT INTO users VALUES("92","AdminTwosssss","AdminTwo","AdminTwo","AdminTwo","AdminTwo","1983-03-03","41","sonerwin8@gmail.comAdminTwo","9359428963","AdminTwo","Male","Married","AdminTwo","Methodist","AdminTwo","AdminTwo","AdminTwo","AdminTwo","AdminTwo","AdminTwo","AdminTwo","Region 1","2001","IT","2.jpg","c050760a0efddcc300ec0cdeffe06756","4","","2024-02-01 20:00:38");
INSERT INTO users VALUES("94","Hak","Hak","Hak","Hak","Hak","1970-02-02","53","Hak@gmail.com","9359428963","Hak","Male","Single","Hak","Iglesia Ni Cristo","Hak","Hak","Hak","Hak","Hak","Hak","Hak","Hak","2003","Computer Science","2.jpg","7d1d036fc71ebf938c78308d84ea3681","4","","2024-02-01 20:19:31");
INSERT INTO users VALUES("96","Secretary","SecretarySecretary","Secretary","Secretary","Secretary","1964-03-11","59","sonerwinSecretary8@gmail.com","9359428963","Secretary","Male","Single","Secretary","United Church Of Christ In The Philippines","Secretary","Secretary","Secretary","Secretary","Secretary","Secretary","Secretary","Secretary","0","Computer Science","2.jpg","b180949356c963a85c848c43a5b90898","4","","2024-02-01 23:20:22");
INSERT INTO users VALUES("97","Officers","Officer","Officer","Officer","Officer","1984-01-31","40","sonerwinOfficer8@gmail.com","9359428963","Officer","Female","Married","Officer","Roman Catholic","Officer","Officer","Officer","Officers","Officer","Officer","Officer","Officer","0","Cashier","2.jpg","a361c1de58e73b1299b7c0449c5e85a4","4","","2024-02-01 23:54:03");
INSERT INTO users VALUES("98","AkoEvealum","AkoEvealum","AkoEvealum","AkoEvealum","AkoEvealum","1986-01-28","38","sonerwin8@gmail.com","9359428963","AkoEvealum","Male","Single","AkoEvealum","Judaism","AkoEvealum","AkoEvealum","AkoEvealum","AkoEvealum","AkoEvealum","AkoEvealum","AkoEvealum","AkoEvealum","2222","Cashier","2.jpg","0192023a7bbd73250516f069df18b500","4","","2024-02-02 02:30:44");
INSERT INTO users VALUES("99","Sadasdasdasdas","Dasdsad","Sadasd","Asdasd","Dsadsa","1995-02-09","29","sonerwin8dsadsadsaa@gmail.com","9359428963","Dasdsad","Male","Single","Dsada","Iglesia Ni Cristo","Dsada","Dsadsa","Dsad","Dsad","Adasdsa","Dasdasd","Medasdasdasdsadellin","Region 12","2222","Cashier","","5a1760628ea739e61d9bb798b50542d5","4","","2024-03-07 00:04:39");



