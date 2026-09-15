<?php

session_start();


// ===============================
// Admin Authentication
// ===============================

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {

    header("Location: ../../index.php");
    exit();

}


// ===============================
// Database & Models
// ===============================

require_once "../../config/database.php";

require_once "../models/Admin.php";
require_once "../models/Doctor.php";
require_once "../models/Patient.php";
require_once "../models/Staff.php";
require_once "../models/Bill.php";
require_once "../models/Appointment.php";


$database = new Database();

$db = $database->connect();


$adminModel = new Admin($db);
$doctorModel = new Doctor($db);
$patientModel = new Patient($db);
$staffModel = new Staff($db);
$billModel = new Bill($db);
$appointmentModel = new Appointment($db);


// ===============================
// Request Parameters
// ===============================

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';


// ===============================
// Create Bill
// ===============================

if (isset($_POST['create_bill'])) {

    $patient_id = $_POST['patient_id'] ?? '';
    $service_name = trim($_POST['service_name'] ?? '');
    $amount = $_POST['amount'] ?? '';
    $bill_date = $_POST['bill_date'] ?? '';

    if (
        $patient_id !== '' &&
        $service_name !== '' &&
        $amount !== '' &&
        $bill_date !== ''
    ) {

        $billModel->createBill(
            $patient_id,
            $service_name,
            $amount,
            $bill_date
        );
    }

    header("Location: AdminController.php?page=billing");
    exit();
}


// ===============================
// Doctor Actions
// ===============================

if ($action === "approve") {

    $doctorModel->updateStatus($id, "approved");

    header("Location: AdminController.php?page=manage_doctor");
    exit();
}


if ($action === "reject") {

    $doctorModel->updateStatus($id, "rejected");

    header("Location: AdminController.php?page=manage_doctor");
    exit();
}


if ($action === "deleteDoctor") {

    $doctorModel->deleteDoctor($id);

    header("Location: AdminController.php?page=manage_doctor");
    exit();
}


// ===============================
// Patient Actions
// ===============================

if ($action === "approvePatient") {

    $patientModel->updateStatus($id, "approved");

    header("Location: AdminController.php?page=manage_patient");
    exit();
}


if ($action === "rejectPatient") {

    $patientModel->updateStatus($id, "rejected");

    header("Location: AdminController.php?page=manage_patient");
    exit();
}


if ($action === "deletePatient") {

    $patientModel->deletePatient($id);

    header("Location: AdminController.php?page=manage_patient");
    exit();
}


// ===============================
// Staff Actions
// ===============================

if ($action === "approveStaff") {

    $staffModel->updateStatus($id, "approved");

    header("Location: AdminController.php?page=manage_staff");
    exit();
}


if ($action === "rejectStaff") {

    $staffModel->updateStatus($id, "rejected");

    header("Location: AdminController.php?page=manage_staff");
    exit();
}


if ($action === "deleteStaff") {

    $staffModel->deleteStaff($id);

    header("Location: AdminController.php?page=manage_staff");
    exit();
}


// ===============================
// Appointment Actions
// ===============================

if ($action === "approveAppointment") {

    $appointmentModel->updateStatus($id, "approved");

    header("Location: AdminController.php?page=manage_appointment");
    exit();
}


if ($action === "cancelAppointment") {

    $appointmentModel->updateStatus($id, "cancelled");

    header("Location: AdminController.php?page=manage_appointment");
    exit();
}


// ===============================
// Page Routing
// ===============================

$page = $_GET['page'] ?? 'dashboard';


// ===============================
// Manage Doctors
// ===============================

if ($page === "manage_doctor") {

    $result = $doctorModel->getAllDoctors();

    require "../views/admin/manage_doctor.php";

}


// ===============================
// Manage Patients
// ===============================

elseif ($page === "manage_patient") {

    $result = $patientModel->getAllPatients();

    require "../views/admin/manage_patient.php";

}


// ===============================
// Manage Staff
// ===============================

elseif ($page === "manage_staff") {

    $result = $staffModel->getAllStaff();

    require "../views/admin/manage_staff.php";

}


// ===============================
// Billing
// ===============================

elseif ($page === "billing") {

    $patients = $billModel->getPatients();

    require "../views/admin/billing.php";

}


// ===============================
// Manage Appointments
// ===============================

elseif ($page === "manage_appointment") {

    $result = $appointmentModel->getAllAppointments();

    require "../views/admin/manage_appointment.php";

}


// ===============================
// Admin Dashboard
// ===============================

else {

    $data = $adminModel->getDashboardData();

    $totalDoctor = $data['totalDoctor'] ?? 0;
    $totalPatient = $data['totalPatient'] ?? 0;
    $totalStaff = $data['totalStaff'] ?? 0;
    $totalAppointment = $data['totalAppointment'] ?? 0;
    $totalRevenue = $data['totalRevenue'] ?? 0;

    require "../views/admin/dashboard.php";
}

?>