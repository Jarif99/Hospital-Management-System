<?php

session_start();


require_once "../../config/database.php";
require_once "../models/User.php";


class AuthController
{

    private $user;


    public function __construct()
    {

        $database = new Database();

        $db = $database->connect();


        $this->user = new User($db);

    }



    public function login()
    {


        $email = $_POST['email'];

        $password = $_POST['password'];

        $role = $_POST['role'];



        $result = $this->user->login(
            $email,
            $password,
            $role
        );



        if($result)
        {

            if($result['status'] !== "approved")
            {
                echo "Account waiting for admin approval";
                exit();
            }


            $_SESSION['user_id'] = $result['id'];

            $_SESSION['role'] = $result['role'];



            if($role=="admin")
            {
                header("Location: AdminController.php?page=dashboard");
            }


            elseif($role=="doctor")
            {
                header("Location: DoctorController.php?page=dashboard");
            }


            elseif($role=="patient")
            {
                header("Location: PatientController.php?page=dashboard");
            }


            elseif($role=="staff")
            {
                header("Location: StaffController.php?page=dashboard");
            }


            exit();

        }
        else
        {

            echo "Invalid Email or Password";

        }


    }



    public function register()
    {

        $name = trim($_POST['full_name'] ?? '');

        $email = trim($_POST['email'] ?? '');

        $password = $_POST['password'] ?? '';

        $role = $_POST['role'] ?? '';


        if($name === '' || $email === '' || $password === '' || $role === '')
        {
            echo "All fields are required.";
            exit();
        }


        $result = $this->user->register(
            $name,
            $email,
            $password,
            $role
        );


        if($result)
        {
            echo "Registration Successful. Waiting for Admin Approval.";
        }
        else
        {
            echo "Registration Failed.";
        }

    }


}



if(isset($_POST['login']))
{

    $controller = new AuthController();

    $controller->login();

}


if(isset($_POST['register']))
{

    $controller = new AuthController();

    $controller->register();

}


?>