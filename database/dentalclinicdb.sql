-- Dental Clinic Appointment System
-- Database dump for phpMyAdmin import (WAMP / MariaDB)
-- Matches schema submitted in Key Milestone 3

SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS dentalclinicdb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE dentalclinicdb;

-- ---------------------------------------------------------------
-- Table: specialization
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `specialization`;
CREATE TABLE `specialization` (
  `SpecializationID` INT(11) NOT NULL AUTO_INCREMENT,
  `SpecializationName` VARCHAR(100) DEFAULT NULL,
  `Description` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`SpecializationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `specialization` (`SpecializationID`, `SpecializationName`, `Description`) VALUES
(1, 'Orthodontics', 'Teeth Alignment'),
(2, 'Endodontics', 'Root Canal Treatment'),
(3, 'Pediatric Dentistry', 'Children Dentistry');

-- ---------------------------------------------------------------
-- Table: patient
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `PatientID` INT(11) NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(50) DEFAULT NULL,
  `LastName` VARCHAR(50) DEFAULT NULL,
  `Gender` VARCHAR(10) DEFAULT NULL,
  `DateOfBirth` DATE DEFAULT NULL,
  `PhoneNumber` VARCHAR(20) DEFAULT NULL,
  `Email` VARCHAR(100) DEFAULT NULL,
  `Address` VARCHAR(255) DEFAULT NULL,
  `RegistrationDate` DATE DEFAULT NULL,
  PRIMARY KEY (`PatientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `patient` (`PatientID`, `FirstName`, `LastName`, `Gender`, `DateOfBirth`, `PhoneNumber`, `Email`, `Address`, `RegistrationDate`) VALUES
(1, 'Ali', 'Khan', 'Male', '2000-03-15', '03001234567', 'ali@gmail.com', 'Peshawar', '2025-01-10'),
(2, 'Sara', 'Ahmed', 'Female', '1999-08-20', '03111234567', 'sara@gmail.com', 'Islamabad', '2025-02-15'),
(3, 'Usman', 'Ali', 'Male', '2001-05-12', '03221234567', 'usman@gmail.com', 'Lahore', '2025-03-01');

-- ---------------------------------------------------------------
-- Table: receptionist
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `receptionist`;
CREATE TABLE `receptionist` (
  `ReceptionistID` INT(11) NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(50) DEFAULT NULL,
  `LastName` VARCHAR(50) DEFAULT NULL,
  `PhoneNumber` VARCHAR(20) DEFAULT NULL,
  `Email` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`ReceptionistID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `receptionist` (`ReceptionistID`, `FirstName`, `LastName`, `PhoneNumber`, `Email`) VALUES
(1, 'Fatima', 'Noor', '03011111111', 'fatima@clinic.com'),
(2, 'Ayesha', 'Khan', '03022222222', 'ayesha@clinic.com');

-- ---------------------------------------------------------------
-- Table: dentist
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `dentist`;
CREATE TABLE `dentist` (
  `DentistID` INT(11) NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(50) DEFAULT NULL,
  `LastName` VARCHAR(50) DEFAULT NULL,
  `PhoneNumber` VARCHAR(20) DEFAULT NULL,
  `Email` VARCHAR(100) DEFAULT NULL,
  `SpecializationID` INT(11) DEFAULT NULL,
  PRIMARY KEY (`DentistID`),
  KEY `SpecializationID` (`SpecializationID`),
  CONSTRAINT `dentist_ibfk_1` FOREIGN KEY (`SpecializationID`) REFERENCES `specialization` (`SpecializationID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dentist` (`DentistID`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `SpecializationID`) VALUES
(1, 'Ahmed', 'Khan', '03005556666', 'ahmed@clinic.com', 1),
(2, 'Bilal', 'Shah', '03007778888', 'bilal@clinic.com', 2),
(3, 'Hina', 'Ali', '03009990000', 'hina@clinic.com', 3);

-- ---------------------------------------------------------------
-- Table: appointment
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment` (
  `AppointmentID` INT(11) NOT NULL AUTO_INCREMENT,
  `AppointmentDate` DATE DEFAULT NULL,
  `AppointmentTime` TIME DEFAULT NULL,
  `Status` VARCHAR(30) DEFAULT NULL,
  `PatientID` INT(11) DEFAULT NULL,
  `DentistID` INT(11) DEFAULT NULL,
  `ReceptionistID` INT(11) DEFAULT NULL,
  PRIMARY KEY (`AppointmentID`),
  KEY `PatientID` (`PatientID`),
  KEY `DentistID` (`DentistID`),
  KEY `ReceptionistID` (`ReceptionistID`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`) ON DELETE SET NULL,
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`DentistID`) REFERENCES `dentist` (`DentistID`) ON DELETE SET NULL,
  CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`ReceptionistID`) REFERENCES `receptionist` (`ReceptionistID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `appointment` (`AppointmentID`, `AppointmentDate`, `AppointmentTime`, `Status`, `PatientID`, `DentistID`, `ReceptionistID`) VALUES
(1, '2025-06-10', '09:00:00', 'Scheduled', 1, 1, 1),
(2, '2025-06-11', '10:00:00', 'Completed', 2, 2, 2),
(3, '2025-06-12', '11:00:00', 'Scheduled', 3, 3, 1);

-- ---------------------------------------------------------------
-- Table: treatment
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `treatment`;
CREATE TABLE `treatment` (
  `TreatmentID` INT(11) NOT NULL AUTO_INCREMENT,
  `TreatmentName` VARCHAR(100) DEFAULT NULL,
  `Description` VARCHAR(255) DEFAULT NULL,
  `TreatmentCost` DECIMAL(10,2) DEFAULT NULL,
  `AppointmentID` INT(11) DEFAULT NULL,
  PRIMARY KEY (`TreatmentID`),
  KEY `AppointmentID` (`AppointmentID`),
  CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `treatment` (`TreatmentID`, `TreatmentName`, `Description`, `TreatmentCost`, `AppointmentID`) VALUES
(1, 'Braces', 'Teeth Alignment', 50000.00, 1),
(2, 'Root Canal', 'Tooth Repair', 15000.00, 2),
(3, 'Cleaning', 'Dental Cleaning', 5000.00, 3);

-- ---------------------------------------------------------------
-- Table: prescription
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `prescription`;
CREATE TABLE `prescription` (
  `PrescriptionID` INT(11) NOT NULL AUTO_INCREMENT,
  `MedicationName` VARCHAR(100) DEFAULT NULL,
  `Dosage` VARCHAR(50) DEFAULT NULL,
  `Duration` VARCHAR(50) DEFAULT NULL,
  `TreatmentID` INT(11) DEFAULT NULL,
  PRIMARY KEY (`PrescriptionID`),
  KEY `TreatmentID` (`TreatmentID`),
  CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`TreatmentID`) REFERENCES `treatment` (`TreatmentID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `prescription` (`PrescriptionID`, `MedicationName`, `Dosage`, `Duration`, `TreatmentID`) VALUES
(1, 'Amoxicillin', '500mg', '7 Days', 1),
(2, 'Ibuprofen', '200mg', '5 Days', 2),
(3, 'Paracetamol', '500mg', '3 Days', 3);

-- ---------------------------------------------------------------
-- Table: xrayrecord
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `xrayrecord`;
CREATE TABLE `xrayrecord` (
  `XRayID` INT(11) NOT NULL AUTO_INCREMENT,
  `FilePath` VARCHAR(255) DEFAULT NULL,
  `UploadDate` DATE DEFAULT NULL,
  `Notes` VARCHAR(255) DEFAULT NULL,
  `PatientID` INT(11) DEFAULT NULL,
  PRIMARY KEY (`XRayID`),
  KEY `PatientID` (`PatientID`),
  CONSTRAINT `xrayrecord_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `xrayrecord` (`XRayID`, `FilePath`, `UploadDate`, `Notes`, `PatientID`) VALUES
(1, 'xray1.jpg', '2025-06-10', 'Normal', 1),
(2, 'xray2.jpg', '2025-06-11', 'Cavity Detected', 2),
(3, 'xray3.jpg', '2025-06-12', 'Root Issue', 3);

-- ---------------------------------------------------------------
-- Table: invoice
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `InvoiceID` INT(11) NOT NULL AUTO_INCREMENT,
  `InvoiceDate` DATE DEFAULT NULL,
  `TotalAmount` DECIMAL(10,2) DEFAULT NULL,
  `Status` VARCHAR(30) DEFAULT NULL,
  `AppointmentID` INT(11) DEFAULT NULL,
  PRIMARY KEY (`InvoiceID`),
  KEY `AppointmentID` (`AppointmentID`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `invoice` (`InvoiceID`, `InvoiceDate`, `TotalAmount`, `Status`, `AppointmentID`) VALUES
(1, '2025-06-10', 50000.00, 'Paid', 1),
(2, '2025-06-11', 15000.00, 'Paid', 2),
(3, '2025-06-12', 5000.00, 'Pending', 3);

-- ---------------------------------------------------------------
-- Table: payment
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `PaymentID` INT(11) NOT NULL AUTO_INCREMENT,
  `PaymentDate` DATE DEFAULT NULL,
  `AmountPaid` DECIMAL(10,2) DEFAULT NULL,
  `PaymentMethod` VARCHAR(50) DEFAULT NULL,
  `InvoiceID` INT(11) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `InvoiceID` (`InvoiceID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`InvoiceID`) REFERENCES `invoice` (`InvoiceID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `payment` (`PaymentID`, `PaymentDate`, `AmountPaid`, `PaymentMethod`, `InvoiceID`) VALUES
(1, '2025-06-10', 50000.00, 'Cash', 1),
(2, '2025-06-11', 15000.00, 'Card', 2);

-- ---------------------------------------------------------------
-- Table: reminder
-- ---------------------------------------------------------------
DROP TABLE IF EXISTS `reminder`;
CREATE TABLE `reminder` (
  `ReminderID` INT(11) NOT NULL AUTO_INCREMENT,
  `ReminderDate` DATE DEFAULT NULL,
  `ReminderType` VARCHAR(50) DEFAULT NULL,
  `Status` VARCHAR(30) DEFAULT NULL,
  `AppointmentID` INT(11) DEFAULT NULL,
  PRIMARY KEY (`ReminderID`),
  KEY `AppointmentID` (`AppointmentID`),
  CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `reminder` (`ReminderID`, `ReminderDate`, `ReminderType`, `Status`, `AppointmentID`) VALUES
(1, '2025-06-09', 'SMS', 'Sent', 1),
(2, '2025-06-10', 'Email', 'Sent', 2),
(3, '2025-06-11', 'SMS', 'Pending', 3);

SET FOREIGN_KEY_CHECKS = 1;
