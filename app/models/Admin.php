<?php

class Admin
{

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }




    public function getDashboardData()
    {

        $data = [];



        $stmt = $this->conn->prepare(
            "SELECT id FROM users 
             WHERE role='doctor' 
             AND status='approved'"
        );

        $stmt->execute();

        $data['totalDoctor'] =
        $stmt->get_result()->num_rows;




        $stmt = $this->conn->prepare(
            "SELECT id FROM users 
             WHERE role='patient' 
             AND status='approved'"
        );

        $stmt->execute();

        $data['totalPatient'] =
        $stmt->get_result()->num_rows;




        $stmt = $this->conn->prepare(
            "SELECT id FROM users 
             WHERE role='staff' 
             AND status='approved'"
        );

        $stmt->execute();

        $data['totalStaff'] =
        $stmt->get_result()->num_rows;




        $stmt = $this->conn->prepare(
            "SELECT id FROM appointments"
        );

        $stmt->execute();

        $data['totalAppointment'] =
        $stmt->get_result()->num_rows;




        $stmt = $this->conn->prepare(
            "SELECT SUM(amount) AS total FROM bills"
        );

        $stmt->execute();


        $result = $stmt->get_result()
        ->fetch_assoc();


        $data['totalRevenue'] =
        $result['total'] ?? 0;




        return $data;


    }



}

?>