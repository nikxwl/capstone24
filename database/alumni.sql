-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 12:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_ID` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `log_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `logout_datetime` datetime NOT NULL,
  `logout_remarks` int(11) NOT NULL DEFAULT 0 COMMENT '0=Logged out successfully, 1=Unable to logout last login'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`log_Id`, `user_Id`, `login_datetime`, `logout_datetime`, `logout_remarks`) VALUES
(199, 66, '2024-03-09 19:36:15', '2024-03-09 19:38:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `quest_ID` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `choice_type` varchar(255) NOT NULL,
  `label` text NOT NULL,
  `order_by` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`quest_ID`, `question`, `choice_type`, `label`, `order_by`, `date_created`) VALUES
(30, 'Professional Examination(s) Passed', 'Textfield/Textarea', '', 13, '2024-02-14 06:48:42'),
(31, 'Educational Attainment (Baccalaureate Degree only)', 'Textfield/Textarea', '', 12, '2024-02-14 06:48:54'),
(32, 'Reason(s) for taking the course(s) or pursuing degree(s). You may check (✓) more than one answer.', 'Multiple Answer/Checkboxes', 'High grades in the course or subject area(s)   related to the course, Good grades in high school, Influence of parents or relatives, Peer Influence, Inspired by a role model, Strong passion for the profession, Prospect for immediate employment, Status or prestige of the profession, Availability of course offering in chosen institution, Prospect of career advancement, Affordable for the family, Prospect of attractive compensation, Opportunity for employment abroad, No particular choice or no better idea', 14, '2024-02-14 06:48:58'),
(33, 'Please list down all professional or work-related training program(s) including advance studies you \\r\\nhave attended after college. You may use extra sheet if needed.', 'Textfield/Textarea', '', 15, '2024-02-14 07:01:33'),
(34, 'What made you pursue advance studies? ', 'Multiple Answer/Checkboxes', 'For promotion, For professional development', 152, '2024-02-14 07:02:03'),
(35, 'Are you presently employed?', 'Single Answer/Radio Button', 'Yes, No, Never Employed', 16, '2024-02-14 07:02:41'),
(36, 'Please state reason(s) why you are not yet employed. You may check (✓) more than one answer', 'Multiple Answer/Checkboxes', 'Advance or further study, Family concern and decided not to find a job, Health-related reason(s), Lack of work experience, No job opportunity, Did not look for a job', 17, '2024-02-14 07:03:38'),
(37, 'Present Employment Status', 'Multiple Answer/Checkboxes', 'Regular or Permanent, Temporary, Casual, Contractual, Self-employed', 18, '2024-02-14 07:04:54'),
(38, 'Present occupation (Ex. Grade School Teacher, Electrical Engineer, Self-employed)', 'Textfield/Textarea', '', 19, '2024-02-14 08:06:07'),
(39, 'Major line of business of the company you are presently employed in. Check one only.', 'Multiple Answer/Checkboxes', 'Agriculture, Hunting and Forestry, Fishing, Mining and Quarrying, Manufacturing, Electricity, Gas and Water Supply, Construction, Wholesale and Retail Trade, repair of motor vehicles,   motorcycles and personal and household goods, Hotels and Restaurants, Transport Storage and Communication, Financial Intermediation, Real Estate, Renting and Business Activities, Public Administration and Defense; Compulsory   Social Security, Education, Health and Social Work, Other Community, Social and Personal Service Activities, Private Households with Employed Persons, Extra-territorial Organizations and Bodies', 20, '2024-02-14 08:07:56'),
(40, 'Place of work', 'Single Answer/Radio Button', 'Local, Abroad', 21, '2024-02-14 08:09:33'),
(41, 'Is this your first job after college?', 'Single Answer/Radio Button', 'Yes, No', 22, '2024-02-14 08:10:01'),
(42, 'What are your reason(s) for staying on the job? You may check (✓) more than one answer.', 'Multiple Answer/Checkboxes', 'Salaries and benefits, Career challenge, Related to special skill, Related to course or program of study, Proximity to residence, Peer influence, Family influence', 23, '2024-02-14 08:10:53'),
(43, 'Is your first job related to the course you took up in college?', 'Single Answer/Radio Button', 'Yes, No', 24, '2024-02-14 08:11:15'),
(44, 'What were your reasons for accepting the job? You may check (✓) more than one answer.', 'Multiple Answer/Checkboxes', 'Salaries & benefits, Career challenge, Related to special skills, Proximity to residence', 25, '2024-02-14 08:11:49'),
(46, ' How long did you stay in your first job?', 'Multiple Answer/Checkboxes', 'Less than a month, 1 to 6 months, 7 to 11 months, 1 year to less than 2 years, 2 years to less than 3 years, 3 years to less than 4 years', 27, '2024-02-14 08:13:16'),
(47, 'How did you find your first job?', 'Multiple Answer/Checkboxes', 'Response to an advertisement, As walk-in applicant, Recommended by someone, Information from friends, Arranged by school’s job placement officer, Family business, Job Fair or Public Employment Service Office (PESO)', 28, '2024-02-14 08:14:25'),
(48, 'How long did it take you to land your first job?', 'Single Answer/Radio Button', 'Less than a month, 1 to 6 months, 7 to 11 months, 1 year to less than 2 years, 2 years to less than 3 years, 3 years to less than 4 years', 29, '2024-02-14 08:15:19'),
(49, 'Job Level Position', 'Single Answer/Radio Button', 'Job Level, Rank or Clerical, Professional Technical or Supervisory, Managerial or Executive, Self-employed', 30, '2024-02-14 08:16:30'),
(50, 'What is your initial gross monthly earning in your first job after college?', 'Single Answer/Radio Button', 'Below P 5000.00, P 5000.00 to less than P 10000.00, P 10000.00 to less than P 15000.00, P 15000.00 to less than P 20000.00, P 20000.00 to less than P 25000.00, P 25000.00 and above', 31, '2024-02-14 08:17:13'),
(51, 'Was the curriculum you had in college relevant to your first job?', 'Single Answer/Radio Button', 'Yes, No', 32, '2024-02-14 08:17:25'),
(52, 'If YES, what competencies learned in college did you find very useful in your first job? You may \\r\\ncheck (✓) more than one answer.', 'Multiple Answer/Checkboxes', 'Communication skills, Human Relations skills, Entrepreneurial skills, Information Technology skills, Problem-solving skills, Critical Thinking skills', 33, '2024-02-14 08:18:18'),
(53, 'List down suggestions to further improve your course curriculum', 'Textfield/Textarea', '', 34, '2024-02-14 08:18:26'),
(54, 'What were your reason(s) for changing job? You may check (✓) more than one answer.', 'Multiple Answer/Checkboxes', 'Salaries & benefits, Career challenge, Related to special skills, Proximity to residence', 26, '2024-03-03 16:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
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
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 4 COMMENT '0=Admin, 1=Evaluator, 2=Alumni Officer, 3=Department Secretary, 4=Alumni',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_ID`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`log_Id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`quest_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `log_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `quest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
