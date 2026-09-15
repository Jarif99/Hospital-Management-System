<?php

session_start();


if(!isset($_SESSION['role']) || $_SESSION['role'] != "patient")
{
    header("location:../../index.php");
    exit();
}


require_once "../../config/database.php";
require_once "../models/Patient.php";


$database = new Database();

$db = $database->connect();


$patientModel = new Patient($db);

$patient_id = $_SESSION['user_id'];



/* =========================
   BOOK APPOINTMENT
========================= */

if(isset($_POST['book_appointment']))
{

    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];


    $patientModel->bookAppointment(
        $patient_id,
        $doctor_id,
        $appointment_date,
        $appointment_time
    );


    header("location:PatientController.php?page=appointment");

    exit();

}



/* =========================
   PAGE ROUTING
========================= */

$page = $_GET['page'] ?? 'dashboard';



if($page == "dashboard")
{

    require "../views/patient/dashboard.php";

}



elseif($page == "appointment")
{

    $doctors = $patientModel->getDoctors();

    require "../views/patient/appointment.php";

}



elseif($page == "billing")
{

    $bills = $patientModel->getBills($patient_id);

    require "../views/patient/billing.php";

}



elseif($page == "prescription")
{

    $prescriptions = $patientModel->getPrescriptions($patient_id);

    require "../views/patient/prescription.php";

}



elseif($page == "test_report")
{

    $reports = $patientModel->getReports($patient_id);

    require "../views/patient/test_report.php";

}



elseif($page == "profile")
{

    $patient = $patientModel->getPatientProfile($patient_id);

    require "../views/patient/profile.php";

}

?>