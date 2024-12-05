-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 02:47 AM
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
  `class_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `schedule` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `max_participants` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `specialization` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `members_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `membership_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`members_id`, `name`, `email`, `password`, `membership_type`) VALUES
(3, 'joel', 'j@gmail.com', '$2y$10$wkQXHRS6PT88FXMMDb6A6.TTX3B6h//j2ztbwte9MU0.fRQeOHQVe', 'ANNUAL PREMIUM');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `durartion` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `plan_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Morning Stretch', 'Flexibility Training', 'Low', 'Mat'),
(2, 'Cardio Blast', 'Cardio', 'High', 'Treadmill'),
(3, 'Power Yoga', 'Yoga', 'Moderate', 'Yoga Mat'),
(4, 'Deadlift Challenge', 'Weightlifting', 'High', 'Barbell'),
(5, 'Strength Basics', 'Strength Training', 'Moderate', 'Dumbbells'),
(6, 'HIIT Circuit', 'Cardio', 'High', 'None'),
(7, 'Zen Yoga', 'Yoga', 'Low', 'Yoga Mat'),
(8, 'Bodyweight Mastery', 'Strength Training', 'Moderate', 'None'),
(9, 'Aerobic Dance', 'Aerobic', 'Moderate', 'Music System'),
(10, 'Flex and Stretch', 'Flexibility Training', 'Low', 'None'),
(11, 'Spin Session', 'Cardio', 'High', 'Stationary Bike'),
(12, 'Barbell Power', 'Weightlifting', 'High', 'Barbell'),
(13, 'Pilates Fusion', 'Flexibility Training', 'Low', 'Resistance Bands'),
(14, 'Core Blaster', 'Strength Training', 'High', 'Medicine Ball'),
(15, 'Step Up!', 'Aerobic', 'Moderate', 'Step Platform'),
(16, 'Mobility Boost', 'Flexibility Training', 'Low', 'Foam Roller'),
(17, 'Sprint Intervals', 'Cardio', 'High', 'Track'),
(18, 'Kettlebell Craze', 'Strength Training', 'Moderate', 'Kettlebell'),
(19, 'Sunrise Yoga', 'Yoga', 'Low', 'Yoga Mat'),
(20, 'Full Body Pump', 'Weightlifting', 'High', 'Barbell'),
(21, 'Aerobic Jam', 'Aerobic', 'Moderate', 'Music System'),
(22, 'Balance Builder', 'Flexibility Training', 'Low', 'None'),
(23, 'Rowing Power', 'Cardio', 'High', 'Rowing Machine'),
(24, 'Dumbbell Blitz', 'Strength Training', 'Moderate', 'Dumbbells'),
(25, 'Tranquility Yoga', 'Yoga', 'Low', 'Yoga Mat'),
(26, 'Flex Core', 'Flexibility Training', 'Low', 'None'),
(27, 'Marathon Prep', 'Cardio', 'High', 'Track'),
(28, 'Power Circuit', 'Strength Training', 'High', 'Kettlebells'),
(29, 'Zumba Groove', 'Aerobic', 'Moderate', 'Music System'),
(30, 'Mobility Flow', 'Flexibility Training', 'Low', 'Mat'),
(31, 'Cycling Challenge', 'Cardio', 'High', 'Stationary Bike'),
(32, 'Heavy Lifts', 'Weightlifting', 'High', 'Barbell'),
(33, 'Functional Strength', 'Strength Training', 'Moderate', 'Medicine Ball'),
(34, 'Flow Yoga', 'Yoga', 'Low', 'Yoga Mat'),
(35, 'Core Power', 'Strength Training', 'Moderate', 'Dumbbells'),
(36, 'Dynamic Stretches', 'Flexibility Training', 'Low', 'None'),
(37, 'Trail Running', 'Cardio', 'High', 'Trail Shoes'),
(38, 'Aerobic Rhythms', 'Aerobic', 'Moderate', 'Music System'),
(39, 'Leg Day', 'Weightlifting', 'High', 'Leg Press Machine'),
(40, 'Upper Body Strength', 'Strength Training', 'High', 'Pull-Up Bar'),
(41, 'Meditative Yoga', 'Yoga', 'Low', 'Yoga Mat'),
(42, 'Dance Cardio', 'Aerobic', 'Moderate', 'Music System'),
(43, 'Resistance Flow', 'Flexibility Training', 'Low', 'Resistance Bands'),
(44, 'Treadmill Sprints', 'Cardio', 'High', 'Treadmill'),
(45, 'Power Lifts', 'Weightlifting', 'High', 'Barbell'),
(46, 'Body Sculpt', 'Strength Training', 'Moderate', 'Dumbbells'),
(47, 'Morning Yoga', 'Yoga', 'Low', 'Yoga Mat'),
(48, 'Posture Perfect', 'Flexibility Training', 'Low', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`members_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `members_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
