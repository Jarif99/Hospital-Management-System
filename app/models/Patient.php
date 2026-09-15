<?php

class Patient
{

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }



    public function getPatientProfile($id)
    {

        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE id=?"
        );


        $stmt->bind_param(
            "i",
            $id
        );


        $stmt->execute();


        return $stmt->get_result()
        ->fetch_assoc();

    }




    public function getAllPatients()
    {

        $stmt = $this->conn->prepare(

            "SELECT * FROM users
             WHERE role='patient'"

        );


        $stmt->execute();


        return $stmt->get_result()
        ->fetch_all(MYSQLI_ASSOC);

    }




    public function getDoctors()
    {

        $stmt = $this->conn->prepare(

            "SELECT * FROM users
             WHERE role='doctor'
             AND status='approved'"

        );


        $stmt->execute();


        return $stmt->get_result();

    }




    public function bookAppointment(
        $patient_id,
        $doctor_id,
        $date,
        $time
    )
    {


        $stmt = $this->conn->prepare(

            "INSERT INTO appointments
            (patient_id,doctor_id,appointment_date,appointment_time,status)

            VALUES (?,?,?,?, 'pending')"

        );


        $stmt->bind_param(
            "iiss",
            $patient_id,
            $doctor_id,
            $date,
            $time
        );


        return $stmt->execute();

    }




    public function getAppointments($id)
    {

        $stmt = $this->conn->prepare(

            "SELECT * FROM appointments
             WHERE patient_id=?"

        );


        $stmt->bind_param(
            "i",
            $id
        );


        $stmt->execute();


        return $stmt->get_result();

    }




    public function getBills($id)
    {

        $stmt = $this->conn->prepare(

            "SELECT * FROM bills
             WHERE patient_id=?"

        );


        $stmt->bind_param(
            "i",
            $id
        );


        $stmt->execute();


        return $stmt->get_result();

    }




    public function getPrescriptions($id)
    {


        $stmt = $this->conn->prepare(

        "SELECT prescriptions.*,
        users.full_name AS doctor_name

        FROM prescriptions

        JOIN users

        ON prescriptions.doctor_id=users.id

        WHERE prescriptions.patient_id=?"

        );


        $stmt->bind_param(
            "i",
            $id
        );


        $stmt->execute();


        return $stmt->get_result();

    }




    public function getReports($id)
    {

        $stmt = $this->conn->prepare(

            "SELECT * FROM test_reports
             WHERE patient_id=?"

        );


        $stmt->bind_param(
            "i",
            $id
        );


        $stmt->execute();


        return $stmt->get_result();

    }




    public function updateStatus($id,$status)
    {

        $stmt = $this->conn->prepare(

            "UPDATE users
             SET status=?
             WHERE id=?
             AND role='patient'"

        );


        $stmt->bind_param(
            "si",
            $status,
            $id
        );


        return $stmt->execute();

    }




    public function deletePatient($id)
    {

        $stmt = $this->conn->prepare(

            "DELETE FROM users
             WHERE id=?
             AND role='patient'"

        );


        $stmt->bind_param(
            "i",
            $id
        );


        return $stmt->execute();

    }


}

?>