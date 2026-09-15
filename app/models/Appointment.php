<?php

class Appointment
{

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getAllAppointments()
    {

        $stmt = $this->conn->prepare(

        "SELECT appointments.*,
        patient.full_name AS patient_name,
        doctor.full_name AS doctor_name

        FROM appointments

        JOIN users patient
        ON appointments.patient_id = patient.id

        JOIN users doctor
        ON appointments.doctor_id = doctor.id

        ORDER BY appointments.id DESC"

        );

        $stmt->execute();

        return $stmt->get_result()
        ->fetch_all(MYSQLI_ASSOC);

    }


    public function updateStatus($id, $status)
    {

        $stmt = $this->conn->prepare(

        "UPDATE appointments
         SET status=?
         WHERE id=?"

        );

        $stmt->bind_param(
            "si",
            $status,
            $id
        );

        return $stmt->execute();

    }

}

?>