<?php

class Doctor
{

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }



    public function getDashboardData($doctor_id)
    {

        $data = [];


        $stmt = $this->conn->prepare(
            "SELECT id FROM appointments 
             WHERE doctor_id=?"
        );

        $stmt->bind_param(
            "i",
            $doctor_id
        );

        $stmt->execute();

        $data['totalAppointment'] =
        $stmt->get_result()->num_rows;




        $stmt = $this->conn->prepare(
            "SELECT DISTINCT patient_id 
             FROM appointments
             WHERE doctor_id=?"
        );


        $stmt->bind_param(
            "i",
            $doctor_id
        );


        $stmt->execute();


        $data['totalPatient'] =
        $stmt->get_result()->num_rows;




        $stmt = $this->conn->prepare(
            "SELECT id 
             FROM prescriptions
             WHERE doctor_id=?"
        );


        $stmt->bind_param(
            "i",
            $doctor_id
        );


        $stmt->execute();


        $data['totalPrescription'] =
        $stmt->get_result()->num_rows;



        return $data;

    }





    public function getAllDoctors()
    {

        $stmt = $this->conn->prepare(

            "SELECT * FROM users 
             WHERE role='doctor'"

        );


        $stmt->execute();


        return $stmt->get_result()
        ->fetch_all(MYSQLI_ASSOC);

    }





    public function getAppointments($doctor_id)
    {

        $stmt = $this->conn->prepare(

        "SELECT appointments.*, 
        users.full_name AS patient_name

        FROM appointments

        JOIN users

        ON appointments.patient_id=users.id

        WHERE appointments.doctor_id=?

        AND appointments.status='approved'"

        );


        $stmt->bind_param(
            "i",
            $doctor_id
        );


        $stmt->execute();


        return $stmt->get_result()
        ->fetch_all(MYSQLI_ASSOC);

    }





    public function getPatients()
    {

        $stmt = $this->conn->prepare(

        "SELECT id, full_name, email

        FROM users

        WHERE role='patient'"

        );


        $stmt->execute();


        return $stmt->get_result()
        ->fetch_all(MYSQLI_ASSOC);

    }





    public function getApprovedPatients()
    {

        $stmt = $this->conn->prepare(

        "SELECT id, full_name

        FROM users

        WHERE role='patient'

        AND status='approved'"

        );


        $stmt->execute();


        return $stmt->get_result()
        ->fetch_all(MYSQLI_ASSOC);

    }





    public function savePrescription(
        $doctor_id,
        $patient_id,
        $diagnosis,
        $medicine,
        $advice
    )
    {


        $stmt = $this->conn->prepare(

        "INSERT INTO prescriptions
        (doctor_id,patient_id,diagnosis,medicine,advice)

        VALUES (?,?,?,?,?)"

        );


        $stmt->bind_param(
            "iisss",
            $doctor_id,
            $patient_id,
            $diagnosis,
            $medicine,
            $advice
        );


        return $stmt->execute();

    }





    public function updateStatus($id,$status)
    {

        $stmt = $this->conn->prepare(

        "UPDATE users 
         SET status=? 
         WHERE id=? 
         AND role='doctor'"

        );


        $stmt->bind_param(
            "si",
            $status,
            $id
        );


        return $stmt->execute();

    }





    public function deleteDoctor($id)
    {

        $stmt = $this->conn->prepare(

        "DELETE FROM users 
         WHERE id=? 
         AND role='doctor'"

        );


        $stmt->bind_param(
            "i",
            $id
        );


        return $stmt->execute();

    }



}

?>