-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 03:43 PM
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
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classes_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descriiption` text NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `schedule` datetime NOT NULL,
  `max_participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `email`, `password`, `type`) VALUES
(13, 'jesus', 'j@gmail.com', '$2y$10$pvudM0yEp2dgCp3fpmzhP.8jSp2bd.RZ.gwbO82hXEimtUgkigyJe', 'Annual Premium');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `type`, `price`, `duration`, `description`) VALUES
(1, 'Basic', 300.00, '2024-11-25 00:00:00', 'Access to gym facilities during off-peak hours'),
(2, 'Standard', 500.00, '2024-11-25 00:00:00', 'Full access to gym facilities and group classes'),
(3, 'Premium', 700.00, '2024-11-25 00:00:00', 'Full access to gym, group classes, and personal trainer sessions'),
(4, 'Annual Basic', 3000.00, '2025-10-25 00:00:00', 'Basic membership for a year with discounted price'),
(5, 'Annual Premium', 7000.00, '2025-10-25 00:00:00', 'Premium membership for a year with discounted price');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `plan_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`plan_id`, `name`, `description`, `price`) VALUES
(1, 'Spartan Program', 'A 12-week intense program to build strength and endurance', 5000.00),
(2, 'Weight Loss Plan', 'A personalized plan focused on losing fat within 8 weeks', 4000.00),
(3, 'Muscle Gain Plan', 'A high-protein diet and weightlifting-focused plan', 4500.00),
(4, 'Yoga Mastery', 'Unlimited yoga classes for one month', 3500.00),
(5, 'HIIT Bootcamp', '4-week high-intensity interval training sessions', 3000.00),
(6, 'Marathon Training Plan', '10-week preparation for long-distance running', 4800.00),
(7, 'Strength & Conditioning', 'A plan to improve overall body strength', 4000.00),
(8, 'Personal Training Plan', '10 one-on-one personal training sessions', 6000.00),
(9, 'Beginner Gym Guide', '4-week plan for new gym-goers to build confidence', 2500.00),
(10, 'Flexibility Focus', 'A 6-week plan to improve flexibility and mobility', 2800.00);

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `workout_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `intensity` varchar(50) NOT NULL,
  `equipment_used` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workout_id`, `name`, `type`, `intensity`, `equipment_used`) VALUES
(1, 'Bench Press', 'Bodybuilding', 'High', 'Barbell, Bench'),
(2, 'Bicep Curls', 'Bodybuilding', 'Medium', 'Dumbbells'),
(3, 'Tricep Extensions', 'Bodybuilding', 'Medium', 'Dumbbells'),
(4, 'Shoulder Press', 'Bodybuilding', 'High', 'Barbell, Dumbbells'),
(5, 'Lat Pulldown', 'Bodybuilding', 'Medium', 'Lat Pulldown Machine'),
(6, 'Leg Press', 'Bodybuilding', 'High', 'Leg Press Machine'),
(7, 'Dumbbell Flys', 'Bodybuilding', 'Medium', 'Dumbbells, Bench'),
(8, 'Chest Press', 'Bodybuilding', 'High', 'Chest Press Machine'),
(9, 'Calf Raises', 'Bodybuilding', 'Low', 'Calf Raise Machine'),
(10, 'Seated Row', 'Bodybuilding', 'Medium', 'Row Machine'),
(11, 'Burpees', 'CrossFit', 'High', 'None'),
(12, 'Box Jumps', 'CrossFit', 'High', 'Box'),
(13, 'Kettlebell Swings', 'CrossFit', 'High', 'Kettlebell'),
(14, 'Wall Ball Shots', 'CrossFit', 'Medium', 'Medicine Ball'),
(15, 'Pull-Ups', 'CrossFit', 'High', 'Pull-Up Bar'),
(16, 'Thrusters', 'CrossFit', 'High', 'Barbell'),
(17, 'Double Unders', 'CrossFit', 'Medium', 'Jump Rope'),
(18, 'Overhead Squat', 'CrossFit', 'High', 'Barbell'),
(19, 'Handstand Push-Ups', 'CrossFit', 'High', 'None'),
(20, 'Power Snatch', 'CrossFit', 'High', 'Barbell'),
(21, 'Deadlift', 'Powerlifting', 'High', 'Barbell'),
(22, 'Squat', 'Powerlifting', 'High', 'Barbell, Squat Rack'),
(23, 'Bench Press', 'Powerlifting', 'High', 'Barbell, Bench'),
(24, 'Power Clean', 'Powerlifting', 'High', 'Barbell'),
(25, 'Snatch', 'Powerlifting', 'High', 'Barbell'),
(26, 'Front Squat', 'Powerlifting', 'High', 'Barbell'),
(27, 'Rack Pull', 'Powerlifting', 'Medium', 'Barbell, Power Rack'),
(28, 'Sumo Deadlift', 'Powerlifting', 'High', 'Barbell'),
(29, 'Overhead Press', 'Powerlifting', 'Medium', 'Barbell'),
(30, 'Floor Press', 'Powerlifting', 'Medium', 'Barbell'),
(31, 'Kickboxing', 'Self Defense', 'High', 'Punching Bag'),
(32, 'Jab-Cross Combo', 'Self Defense', 'Medium', 'None'),
(33, 'Knee Strikes', 'Self Defense', 'Medium', 'None'),
(34, 'Elbow Strikes', 'Self Defense', 'Medium', 'None'),
(35, 'Self-Defense Drills', 'Self Defense', 'High', 'None'),
(36, 'Roundhouse Kicks', 'Self Defense', 'High', 'None'),
(37, 'Muay Thai Clinch', 'Self Defense', 'High', 'None'),
(38, 'Wrist Escape', 'Self Defense', 'Low', 'None'),
(39, 'Boxing Combinations', 'Self Defense', 'Medium', 'Punching Bag'),
(40, 'Takedown Defense', 'Self Defense', 'High', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classes_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`workout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
