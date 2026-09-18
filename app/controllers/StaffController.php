<?php

session_start();


if (!isset($_SESSION['role']) || $_SESSION['role'] != "staff")
{
    header("location:../../index.php");
    exit();
}


require_once "../../config/database.php";
require_once "../models/Staff.php";


$database = new Database();

$db = $database->connect();


$staffModel = new Staff($db);


$page = $_GET['page'] ?? 'dashboard';


if ($page == "dashboard")
{
    require "../views/staff/dashboard.php";
}


elseif ($page == "appointment")
{
    $appointments = $staffModel->getAppointments();

    require "../views/staff/appointment.php";
}


elseif ($page == "patient_list")
{
    $patients = $staffModel->getPatients();

    require "../views/staff/patient_list.php";
}


elseif ($page == "billing")
{
    $bills = $staffModel->getBills();

    require "../views/staff/billing.php";
}


elseif ($page == "upload_report")
{
    if (isset($_POST['upload_report']))
    {
        $patient_id = $_POST['patient_id'];
        $title = $_POST['title'];
        $test_date = $_POST['test_date'];

        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0)
        {
            $file = basename($_FILES['file']['name']);

            $uploadDirectory = "../../uploads/";

            if (!is_dir($uploadDirectory))
            {
                mkdir($uploadDirectory, 0777, true);
            }

            $filePath = $uploadDirectory . $file;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath))
            {
                $staffModel->uploadReport(
                    $patient_id,
                    $title,
                    $file,
                    $test_date
                );
            }
        }

        header("location:StaffController.php?page=upload_report");
        exit();
    }

    $patients = $staffModel->getPatients();

    require "../views/staff/upload_report.php";
}


else
{
    header("location:StaffController.php?page=dashboard");
    exit();
}

?>