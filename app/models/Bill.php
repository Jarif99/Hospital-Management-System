<?php

class Bill
{

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }





    public function getPatients()
    {

        $stmt = $this->conn->prepare(

            "SELECT id, full_name 
             FROM users 
             WHERE role='patient'"

        );


        $stmt->execute();


        return $stmt->get_result()
        ->fetch_all(MYSQLI_ASSOC);

    }





    public function createBill(
        $patient_id,
        $service_name,
        $amount,
        $bill_date
    )
    {

        $stmt = $this->conn->prepare(

            "INSERT INTO bills
            (patient_id, service_name, amount, bill_date)

            VALUES (?,?,?,?)"

        );


        $stmt->bind_param(
            "isds",
            $patient_id,
            $service_name,
            $amount,
            $bill_date
        );


        return $stmt->execute();

    }



}

?>