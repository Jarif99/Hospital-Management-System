<?php

session_start();


if(!isset($_SESSION['role']) || $_SESSION['role']!="doctor")
{
    header("location:../../index.php");
    exit();
}



require_once "../../config/database.php";
require_once "../models/Doctor.php";



$database = new Database();

$db = $database->connect();



$doctorModel = new Doctor($db);



$doctor_id = $_SESSION['user_id'];




if(isset($_POST['save_prescription']))
{


    $patient_id = $_POST['patient_id'];

    $diagnosis = $_POST['diagnosis'];

    $medicine = $_POST['medicine'];

    $advice = $_POST['advice'];



    $doctorModel->savePrescription(
        $doctor_id,
        $patient_id,
        $diagnosis,
        $medicine,
        $advice
    );


    header("location:DoctorController.php?page=prescription");

    exit();

}




$page = $_GET['page'] ?? 'dashboard';





if($page=="dashboard")
{

    $data = $doctorModel->getDashboardData($doctor_id);


    $totalAppointment = $data['totalAppointment'];

    $totalPatient = $data['totalPatient'];

    $totalPrescription = $data['totalPrescription'];


    require "../views/doctor/dashboard.php";

}




elseif($page=="appointment")
{

    $appointments = $doctorModel->getAppointments($doctor_id);


    require "../views/doctor/appointment.php";

}




elseif($page=="patient_list")
{

    $patients = $doctorModel->getPatients();


    require "../views/doctor/patient_list.php";

}




elseif($page=="prescription")
{

    $patients = $doctorModel->getApprovedPatients();


    require "../views/doctor/prescription.php";

}


?>