<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialization;
use App\Models\Patient;
use App\Models\Receptionist;
use App\Models\Dentist;
use App\Models\AppointmentModel;
use App\Models\Treatment;
use App\Models\Invoice;
use App\Models\Prescription;
use App\Models\XrayRecord;
use App\Models\Payment;
use App\Models\Reminder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Specialization::insert([
            ['SpecializationID' => 1, 'SpecializationName' => 'Orthodontics', 'Description' => 'Teeth Alignment'],
            ['SpecializationID' => 2, 'SpecializationName' => 'Endodontics', 'Description' => 'Root Canal Treatment'],
            ['SpecializationID' => 3, 'SpecializationName' => 'Pediatric Dentistry', 'Description' => 'Children Dentistry'],
        ]);

        Patient::insert([
            ['PatientID' => 1, 'FirstName' => 'Ali', 'LastName' => 'Khan', 'Gender' => 'Male', 'DateOfBirth' => '2000-03-15', 'PhoneNumber' => '03001234567', 'Email' => 'ali@gmail.com', 'Address' => 'Peshawar', 'RegistrationDate' => '2025-01-10'],
            ['PatientID' => 2, 'FirstName' => 'Sara', 'LastName' => 'Ahmed', 'Gender' => 'Female', 'DateOfBirth' => '1999-08-20', 'PhoneNumber' => '03111234567', 'Email' => 'sara@gmail.com', 'Address' => 'Islamabad', 'RegistrationDate' => '2025-02-15'],
            ['PatientID' => 3, 'FirstName' => 'Usman', 'LastName' => 'Ali', 'Gender' => 'Male', 'DateOfBirth' => '2001-05-12', 'PhoneNumber' => '03221234567', 'Email' => 'usman@gmail.com', 'Address' => 'Lahore', 'RegistrationDate' => '2025-03-01'],
        ]);

        Receptionist::insert([
            ['ReceptionistID' => 1, 'FirstName' => 'Fatima', 'LastName' => 'Noor', 'PhoneNumber' => '03011111111', 'Email' => 'fatima@clinic.com'],
            ['ReceptionistID' => 2, 'FirstName' => 'Ayesha', 'LastName' => 'Khan', 'PhoneNumber' => '03022222222', 'Email' => 'ayesha@clinic.com'],
        ]);

        Dentist::insert([
            ['DentistID' => 1, 'FirstName' => 'Ahmed', 'LastName' => 'Khan', 'PhoneNumber' => '03005556666', 'Email' => 'ahmed@clinic.com', 'SpecializationID' => 1],
            ['DentistID' => 2, 'FirstName' => 'Bilal', 'LastName' => 'Shah', 'PhoneNumber' => '03007778888', 'Email' => 'bilal@clinic.com', 'SpecializationID' => 2],
            ['DentistID' => 3, 'FirstName' => 'Hina', 'LastName' => 'Ali', 'PhoneNumber' => '03009990000', 'Email' => 'hina@clinic.com', 'SpecializationID' => 3],
        ]);

        AppointmentModel::insert([
            ['AppointmentID' => 1, 'AppointmentDate' => '2025-06-10', 'AppointmentTime' => '09:00:00', 'Status' => 'Scheduled', 'PatientID' => 1, 'DentistID' => 1, 'ReceptionistID' => 1],
            ['AppointmentID' => 2, 'AppointmentDate' => '2025-06-11', 'AppointmentTime' => '10:00:00', 'Status' => 'Completed', 'PatientID' => 2, 'DentistID' => 2, 'ReceptionistID' => 2],
            ['AppointmentID' => 3, 'AppointmentDate' => '2025-06-12', 'AppointmentTime' => '11:00:00', 'Status' => 'Scheduled', 'PatientID' => 3, 'DentistID' => 3, 'ReceptionistID' => 1],
        ]);

        Treatment::insert([
            ['TreatmentID' => 1, 'TreatmentName' => 'Braces', 'Description' => 'Teeth Alignment', 'TreatmentCost' => 50000.00, 'AppointmentID' => 1],
            ['TreatmentID' => 2, 'TreatmentName' => 'Root Canal', 'Description' => 'Tooth Repair', 'TreatmentCost' => 15000.00, 'AppointmentID' => 2],
            ['TreatmentID' => 3, 'TreatmentName' => 'Cleaning', 'Description' => 'Dental Cleaning', 'TreatmentCost' => 5000.00, 'AppointmentID' => 3],
        ]);

        Invoice::insert([
            ['InvoiceID' => 1, 'InvoiceDate' => '2025-06-10', 'TotalAmount' => 50000.00, 'Status' => 'Paid', 'AppointmentID' => 1],
            ['InvoiceID' => 2, 'InvoiceDate' => '2025-06-11', 'TotalAmount' => 15000.00, 'Status' => 'Paid', 'AppointmentID' => 2],
            ['InvoiceID' => 3, 'InvoiceDate' => '2025-06-12', 'TotalAmount' => 5000.00, 'Status' => 'Pending', 'AppointmentID' => 3],
        ]);

        Prescription::insert([
            ['PrescriptionID' => 1, 'MedicationName' => 'Amoxicillin', 'Dosage' => '500mg', 'Duration' => '7 Days', 'TreatmentID' => 1],
            ['PrescriptionID' => 2, 'MedicationName' => 'Ibuprofen', 'Dosage' => '200mg', 'Duration' => '5 Days', 'TreatmentID' => 2],
            ['PrescriptionID' => 3, 'MedicationName' => 'Paracetamol', 'Dosage' => '500mg', 'Duration' => '3 Days', 'TreatmentID' => 3],
        ]);

        XrayRecord::insert([
            ['XRayID' => 1, 'FilePath' => 'xray1.jpg', 'UploadDate' => '2025-06-10', 'Notes' => 'Normal', 'PatientID' => 1],
            ['XRayID' => 2, 'FilePath' => 'xray2.jpg', 'UploadDate' => '2025-06-11', 'Notes' => 'Cavity Detected', 'PatientID' => 2],
            ['XRayID' => 3, 'FilePath' => 'xray3.jpg', 'UploadDate' => '2025-06-12', 'Notes' => 'Root Issue', 'PatientID' => 3],
        ]);

        Payment::insert([
            ['PaymentID' => 1, 'PaymentDate' => '2025-06-10', 'AmountPaid' => 50000.00, 'PaymentMethod' => 'Cash', 'InvoiceID' => 1],
            ['PaymentID' => 2, 'PaymentDate' => '2025-06-11', 'AmountPaid' => 15000.00, 'PaymentMethod' => 'Card', 'InvoiceID' => 2],
        ]);

        Reminder::insert([
            ['ReminderID' => 1, 'ReminderDate' => '2025-06-09', 'ReminderType' => 'SMS', 'Status' => 'Sent', 'AppointmentID' => 1],
            ['ReminderID' => 2, 'ReminderDate' => '2025-06-10', 'ReminderType' => 'Email', 'Status' => 'Sent', 'AppointmentID' => 2],
            ['ReminderID' => 3, 'ReminderDate' => '2025-06-11', 'ReminderType' => 'SMS', 'Status' => 'Pending', 'AppointmentID' => 3],
        ]);
    }
}
