-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 04:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `birth_date`, `gender`, `phone`, `email_address`, `admin_password`, `photo`, `role`) VALUES
(1, 'Admin', 'Admin', '1995-01-01', 'Male', '651-000-0000', 'admin123@gmail.com', '$2y$10$JOCTzAkHM4A./09F/lPJKOIPtYb80hiUyn89Xr5MPu6Ibzskw.VEe', 'admin.jpg', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `date`, `status`, `employee_id`) VALUES
(1, '2022-02-10', 'Present', 1),
(2, '2022-04-05', 'Late', 3),
(3, '2022-04-12', 'Late', 3),
(4, '2022-04-19', 'Late', 3),
(5, '2022-04-29', 'Late', 3),
(6, '2022-04-30', 'Late', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `name`) VALUES
(1, 'IT'),
(2, 'Sales'),
(3, 'Accounting/Finance'),
(4, 'Marketing'),
(5, 'Operations');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date_joined` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `num_leave` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `birth_date`, `gender`, `email_address`, `emp_password`, `address`, `phone`, `role`, `date_joined`, `photo`, `num_leave`, `dept_id`, `job_id`) VALUES
(1, 'Xeng', 'Xiong', '1999-02-26', 'Male', 'xxiong643423@gmail.com', '$2y$10$/zv.R6osmFRUAvxCGP5O6uwOV9BAO8dPhrlvT9KzMDi3LqI.gLfRS', '100 North Street, St Paul, MN 55123', '651-999-1000', 'Employee', '2022-03-01', 'admin2.png', 0, 5, 13),
(2, 'Seng', 'Khang', '1999-01-01', 'Male', 'seng.khang123@gmail.com', '$2y$10$evppEIYFiZW5KQ2uO9q7fe/3/TmPMgXQVckXKq2SMMO4UNItrem2m', '9241 Elm Road Newtown, PA 18940', '651-234-1234', 'Employee', '2022-03-05', 'defaultEmpPic.png', 0, 2, 7),
(3, 'Salvador', 'Vazquez', '2013-02-08', 'Male', 'salvador.vazquez123@gmail.com', '$2y$10$BWOB7eA7t9VqcrDgzGGiNeVaY27CSyuf4uSNIktkJLIkocE837Kq6', '182 Maiden Dr. Port Charlotte, FL 33952', '651-000-1111', 'Employee', '2022-03-06', 'defaultEmpPic.png', 0, 3, 4),
(4, 'Clayton', 'Miller', '2002-06-04', 'Male', 'clayton.miller123@gmail.com', '$2y$10$wCVNYQTCdjP71JOpVBG9ZuH6jKZ9ziVihtBM7INSaNfJkgYo1.NPW', '1891 Lynn Street, Cambridge, MA Beaver Lake', '651-999-1010', 'Employee', '2022-03-07', 'defaultEmpPic.png', 0, 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `leave_id` bigint(20) NOT NULL,
  `leave_reason` text NOT NULL,
  `leave_start` datetime NOT NULL,
  `leave_end` datetime NOT NULL,
  `leave_color` varchar(7) NOT NULL,
  `state` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`leave_id`, `leave_reason`, `leave_start`, `leave_end`, `leave_color`, `state`, `employee_id`) VALUES
(4, 'Vacation', '2022-03-08 00:00:00', '2022-03-08 00:00:00', '#e4edff', 'Done', 4),
(14, 'Vacation', '2022-04-12 00:00:00', '2022-04-19 00:00:00', '#90EE90', 'Done', 3);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `basic_salary` double NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `title`, `basic_salary`, `dept_id`) VALUES
(1, 'Web Developer', 5200, 1),
(2, 'Network Administrator', 5300, 1),
(3, 'Graphic Designer', 4300, 1),
(4, 'Financial Manager', 5500, 3),
(5, 'Auditors', 4300, 3),
(6, 'Financial Analyst', 5300, 3),
(7, 'Sales Manager', 5700, 2),
(8, 'Sales Consultant', 3300, 2),
(9, 'Collection Agent', 2600, 2),
(10, 'Marketing Manager', 7900, 4),
(11, 'Marketing Assistant', 3600, 4),
(12, 'Marketing Specialist', 4500, 4),
(13, 'Operations Coordinator', 3400, 5),
(14, 'Operations Manager', 7800, 5),
(15, 'Operations Analyst', 4600, 5);

-- --------------------------------------------------------

--
-- Table structure for table `passreset`
--

CREATE TABLE `passreset` (
  `passResetId` int(1) NOT NULL,
  `passResetEmail` text NOT NULL,
  `passResetCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passreset`
--

INSERT INTO `passreset` (`passResetId`, `passResetEmail`, `passResetCode`) VALUES
(26, 'xxiong643423@gmail.com', 400333);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `gross_pay` int(11) NOT NULL,
  `allowance` double NOT NULL,
  `deduction` double NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `net_pay` double NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `gross_pay`, `allowance`, `deduction`, `payment_method`, `net_pay`, `date`, `employee_id`, `dept_id`) VALUES
(1, 3400, 500, 100, 'Check', 3800, '2022-03-22', 1, 5),
(2, 5700, 150, 80, 'Direct Deposit', 5770, '2022-03-22', 2, 2),
(3, 5500, 100, 200, 'Check', 5400, '2022-03-22', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `fk_attendance_emp` (`employee_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD KEY `fk_emp_dept` (`dept_id`),
  ADD KEY `fk_emp_job` (`job_id`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `fk_leave_emp` (`employee_id`),
  ADD KEY `leave_start` (`leave_start`),
  ADD KEY `leave_end` (`leave_end`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `fk_job_dept` (`dept_id`);

--
-- Indexes for table `passreset`
--
ALTER TABLE `passreset`
  ADD PRIMARY KEY (`passResetId`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `fk_salary_emp` (`employee_id`),
  ADD KEY `fk_salary_dept` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `leave_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `passreset`
--
ALTER TABLE `passreset`
  MODIFY `passResetId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_emp` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_emp_dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_emp_job` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE;

--
-- Constraints for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD CONSTRAINT `fk_leave_emp` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `fk_salary_dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `fk_salary_emp` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
