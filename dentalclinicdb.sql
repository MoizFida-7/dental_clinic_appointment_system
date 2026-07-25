-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2026 at 02:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentalclinicdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `DentistID` int(11) DEFAULT NULL,
  `ReceptionistID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `AppointmentDate`, `AppointmentTime`, `Status`, `PatientID`, `DentistID`, `ReceptionistID`) VALUES
(1, '2025-06-10', '09:00:00', 'Scheduled', 1, 1, 1),
(2, '2025-06-11', '10:00:00', 'Completed', 2, 2, 2),
(3, '2025-06-12', '11:00:00', 'Scheduled', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `DentistID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `SpecializationID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`DentistID`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `SpecializationID`) VALUES
(1, 'Ahmed', 'Khan', '03005556666', 'ahmed@clinic.com', 1),
(2, 'Bilal', 'Shah', '03007778888', 'bilal@clinic.com', 2),
(3, 'Hina', 'Ali', '03009990000', 'hina@clinic.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceID` int(11) NOT NULL,
  `InvoiceDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `AppointmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceID`, `InvoiceDate`, `TotalAmount`, `Status`, `AppointmentID`) VALUES
(1, '2025-06-10', 50000.00, 'Paid', 1),
(2, '2025-06-11', 15000.00, 'Paid', 2),
(3, '2025-06-12', 5000.00, 'Pending', 3);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `RegistrationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `FirstName`, `LastName`, `Gender`, `DateOfBirth`, `PhoneNumber`, `Email`, `Address`, `RegistrationDate`) VALUES
(1, 'Ali', 'Khan', 'Male', '2000-03-15', '03001234567', 'ali@gmail.com', 'Peshawar', '2025-01-10'),
(2, 'Sara', 'Ahmed', 'Female', '1999-08-20', '03111234567', 'sara@gmail.com', 'Islamabad', '2025-02-15'),
(3, 'Usman', 'Ali', 'Male', '2001-05-12', '03221234567', 'usman@gmail.com', 'Lahore', '2025-03-01'),
(4, 'umar', 'aziz', 'male', '2003-12-20', '03175572472', '23pwcse2311@uetpeshawar.edu.pk', 'Mingora, Swat', '2026-07-07'),
(6, 'mohammad', 'muhammad', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `PaymentDate` date DEFAULT NULL,
  `AmountPaid` decimal(10,2) DEFAULT NULL,
  `PaymentMethod` varchar(50) DEFAULT NULL,
  `InvoiceID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `PaymentDate`, `AmountPaid`, `PaymentMethod`, `InvoiceID`) VALUES
(1, '2025-06-10', 50000.00, 'Cash', 1),
(2, '2025-06-11', 15000.00, 'Card', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `PrescriptionID` int(11) NOT NULL,
  `MedicationName` varchar(100) DEFAULT NULL,
  `Dosage` varchar(50) DEFAULT NULL,
  `Duration` varchar(50) DEFAULT NULL,
  `TreatmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`PrescriptionID`, `MedicationName`, `Dosage`, `Duration`, `TreatmentID`) VALUES
(1, 'Amoxicillin', '500mg', '7 Days', 1),
(2, 'Ibuprofen', '200mg', '5 Days', 2),
(3, 'Paracetamol', '500mg', '3 Days', 3);

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `ReceptionistID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`ReceptionistID`, `FirstName`, `LastName`, `PhoneNumber`, `Email`) VALUES
(1, 'Fatima', 'Noor', '03011111111', 'fatima@clinic.com'),
(2, 'Ayesha', 'Khan', '03022222222', 'ayesha@clinic.com');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `ReminderID` int(11) NOT NULL,
  `ReminderDate` date DEFAULT NULL,
  `ReminderType` varchar(50) DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `AppointmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`ReminderID`, `ReminderDate`, `ReminderType`, `Status`, `AppointmentID`) VALUES
(1, '2025-06-09', 'SMS', 'Sent', 1),
(2, '2025-06-10', 'Email', 'Sent', 2),
(3, '2025-06-11', 'SMS', 'Pending', 3);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `SpecializationID` int(11) NOT NULL,
  `SpecializationName` varchar(100) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`SpecializationID`, `SpecializationName`, `Description`) VALUES
(1, 'Orthodontics', 'Teeth Alignment'),
(2, 'Endodontics', 'Root Canal Treatment'),
(3, 'Pediatric Dentistry', 'Children Dentistry');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `TreatmentID` int(11) NOT NULL,
  `TreatmentName` varchar(100) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `TreatmentCost` decimal(10,2) DEFAULT NULL,
  `AppointmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`TreatmentID`, `TreatmentName`, `Description`, `TreatmentCost`, `AppointmentID`) VALUES
(1, 'Braces', 'Teeth Alignment', 50000.00, 1),
(2, 'Root Canal', 'Tooth Repair', 15000.00, 2),
(3, 'Cleaning', 'Dental Cleaning', 5000.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `xrayrecord`
--

CREATE TABLE `xrayrecord` (
  `XRayID` int(11) NOT NULL,
  `FilePath` varchar(255) DEFAULT NULL,
  `UploadDate` date DEFAULT NULL,
  `Notes` varchar(255) DEFAULT NULL,
  `PatientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xrayrecord`
--

INSERT INTO `xrayrecord` (`XRayID`, `FilePath`, `UploadDate`, `Notes`, `PatientID`) VALUES
(1, 'xray1.jpg', '2025-06-10', 'Normal', 1),
(2, 'xray2.jpg', '2025-06-11', 'Cavity Detected', 2),
(3, 'xray3.jpg', '2025-06-12', 'Root Issue', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DentistID` (`DentistID`),
  ADD KEY `ReceptionistID` (`ReceptionistID`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`DentistID`),
  ADD KEY `SpecializationID` (`SpecializationID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `AppointmentID` (`AppointmentID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `InvoiceID` (`InvoiceID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`PrescriptionID`),
  ADD KEY `TreatmentID` (`TreatmentID`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`ReceptionistID`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`ReminderID`),
  ADD KEY `AppointmentID` (`AppointmentID`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`SpecializationID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`TreatmentID`),
  ADD KEY `AppointmentID` (`AppointmentID`);

--
-- Indexes for table `xrayrecord`
--
ALTER TABLE `xrayrecord`
  ADD PRIMARY KEY (`XRayID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `DentistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`DentistID`) REFERENCES `dentist` (`DentistID`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`ReceptionistID`) REFERENCES `receptionist` (`ReceptionistID`);

--
-- Constraints for table `dentist`
--
ALTER TABLE `dentist`
  ADD CONSTRAINT `dentist_ibfk_1` FOREIGN KEY (`SpecializationID`) REFERENCES `specialization` (`SpecializationID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`InvoiceID`) REFERENCES `invoice` (`InvoiceID`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`TreatmentID`) REFERENCES `treatment` (`TreatmentID`);

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`);

--
-- Constraints for table `xrayrecord`
--
ALTER TABLE `xrayrecord`
  ADD CONSTRAINT `xrayrecord_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
