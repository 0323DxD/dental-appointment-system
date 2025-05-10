-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 05:26 PM
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
-- Database: `dental_booking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `medicalRecord` text DEFAULT NULL,
  `procedure` varchar(100) DEFAULT NULL,
  `price` varchar(100) NOT NULL,
  `bookingDate` date DEFAULT NULL,
  `preferredTime` time DEFAULT NULL,
  `insurance` varchar(10) DEFAULT NULL,
  `assigned_doctor` varchar(100) DEFAULT NULL,
  `status` enum('Scheduled','Completed','Canceled','Pending') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `name`, `age`, `email`, `contact`, `medicalRecord`, `procedure`, `price`, `bookingDate`, `preferredTime`, `insurance`, `assigned_doctor`, `status`, `created_at`, `updated_at`) VALUES
(1, '4d390baa-0c4f-4baf-981b-bc20489dbeb9', 'Denmhar Dimaculangan', 23, 'denmhardimaculangan12@gmail.com', '09995954454', 'N/A', 'Crowns', '9000.00', '2025-05-16', '12:00:00', 'No', 'Dentist One', 'Scheduled', '2025-05-07 15:00:48', '2025-05-09 14:43:58'),
(2, 'd24e40e1-d4ed-4b5c-83cf-6379578e6577', 'Joyce Angeles', 25, 'trinit@gmail.com', '09664179718', 'N/A', 'Gum Health Assessment', '700.00', '2025-05-16', '13:00:00', 'No', 'Dentist One', 'Scheduled', '2025-05-09 14:31:48', '2025-05-09 15:10:35'),
(3, '4d390baa-0c4f-4baf-981b-bc20489dbeb9', 'Denmhar Dimaculangan', 24, 'denmhardimaculangan12@gmail.com', '09995954454', 'N/A', 'Crowns', '9000.00', '2025-05-10', '14:00:00', 'No', NULL, 'Pending', '2025-05-09 15:12:05', '2025-05-09 15:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `dentist_name` text NOT NULL,
  `patient_name` text NOT NULL,
  `notes` text NOT NULL,
  `prescription_issued` timestamp NOT NULL DEFAULT current_timestamp(),
  `prescription_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `dentist_name`, `patient_name`, `notes`, `prescription_issued`, `prescription_updated`) VALUES
(5, 'Dentist One', 'Denmhar Dimaculangan', '<p>N/A</p>', '2025-05-07 09:36:49', '2025-05-08 14:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `day`, `startTime`, `endTime`) VALUES
(1, 'Monday', '08:00:00', '17:00:00'),
(2, 'Tuesday', '08:00:00', '17:00:00'),
(3, 'Wednesday', '08:00:00', '17:00:00'),
(4, 'Thursday', '08:00:00', '17:00:00'),
(6, 'Friday', '08:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `description`, `price`) VALUES
(1, 'Cleaning', 'Removes plaque, tartar, and surface stains to maintain oral hygiene and prevent gum disease. Done using specialized dental tools and polishing.', '800.00'),
(2, 'Checkup', 'A thorough examination of your teeth, gums, and mouth for signs of decay, disease, or other issues. X-rays may be taken as needed.', '500.00'),
(3, 'Root Canal', 'A treatment to save a severely infected tooth by removing the damaged pulp, disinfecting the canal, and sealing it with a filling.', '6000.00'),
(4, 'Teeth Whitening', 'Cosmetic treatment using safe bleaching agents to remove stains and brighten your smile. Performed in-office for fast, visible results.', '4000.00'),
(5, 'Gum Treatment', 'Treats gum inflammation and periodontal disease. Includes deep cleaning (scaling and root planing), antibiotics, and follow-up care.', '2500.00'),
(6, 'Orthodontic Consultation', 'A complete assessment to determine if you need braces or aligners to correct teeth alignment and bite issues.', '1000.00'),
(7, 'Oral Cancer Screening', 'A painless exam that checks for early signs of oral cancer, such as abnormal lumps, sores, or discoloration in your mouth or throat.', '1200.00'),
(8, 'Gum Health Assessment', 'Evaluation of gum condition, pocket depth, and signs of inflammation or bleeding to detect early gum disease and maintain oral health.', '700.00'),
(9, 'Tooth Extraction', 'Removal of a severely damaged or decayed tooth when no other treatment is effective. Performed under local anesthesia for comfort.', '1500.00'),
(10, 'Dental Filling', 'Used to restore a decayed tooth by removing the cavity and filling the space with tooth-colored material for a natural look and function.', '1200.00'),
(11, 'Crowns', 'A crown is a custom-made cap placed over a damaged tooth to restore its shape, strength, and appearance. Often used after root canals.', '9000.00'),
(12, 'Denture', 'Removable replacements for missing teeth and gums. Available in full or partial sets, dentures help restore your smile and chewing function.', '10000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('Patient','Dentist','Administrator') NOT NULL DEFAULT 'Patient',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_username_change` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_password_change` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `username`, `password`, `phone`, `role`, `created_at`, `updated_at`, `last_username_change`, `last_password_change`) VALUES
(3, '2137d1fd-7fe6-4a20-99fe-b137f7e33035', 'TDS Admin', 'trinitysmilesdc@gmail.com', 'tdsadmin', '$2y$10$D9IsCHf9xzWqPLlElabG3uG4oVrRf3LDs0lTWiwS3fVOtSsV1S5/e', '09664179718', 'Administrator', '2025-05-06 06:52:04', '2025-05-06 06:58:25', '2025-05-06 06:58:25', '2025-05-06 06:58:25'),
(9, '81c1570b-4951-4b60-852a-f8aeaf4110d5', 'TDS Admin Two', 'trinitysmilesdc2@gmail.com', 'tdsadmintwo', '$2y$10$kcebF.ztIPUYUTKd5WS/C.7X01twpwIz5pjIkCcol8ruQgQtR7uZq', '09664179718', 'Administrator', '2025-05-06 08:15:38', '2025-05-06 08:15:38', '2025-05-06 08:15:38', '2025-05-06 08:15:38'),
(10, '1ff32070-f290-4a78-8387-3a369452eaa2', 'Dentist One', 'dentistone@gmail.com', 'dentist1', '$2y$10$Mnm61bOZs78FXM1rFE6LGukpStAQ2Ose.HnVAOda6IlPNOCWN0pAy', '09664179718', 'Dentist', '2025-05-06 12:46:41', '2025-05-07 09:15:45', '2025-05-07 03:15:45', '2025-05-06 12:46:41'),
(11, '4d390baa-0c4f-4baf-981b-bc20489dbeb9', 'Denmhar Dimaculangan', 'denmhardimaculangan12@gmail.com', 'denmhar', '$2y$10$6D2oWn8RQNnn50/c.Vu/.uGvrJNtb.7egpmrNw2aV4g6.MPRymt3O', '09995954454', 'Patient', '2025-05-06 12:53:28', '2025-05-07 10:07:27', '2025-05-06 12:53:28', '2025-05-06 12:53:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
