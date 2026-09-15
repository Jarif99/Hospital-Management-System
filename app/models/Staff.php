<?php

class Staff
{

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getAllStaff()
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users
             WHERE role='staff'"
        );

        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function updateStatus($id, $status)
    {
        $stmt = $this->conn->prepare(
            "UPDATE users
             SET status=?
             WHERE id=?
             AND role='staff'"
        );

        $stmt->bind_param(
            "si",
            $status,
            $id
        );

        return $stmt->execute();
    }


    public function deleteStaff($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM users
             WHERE id=?
             AND role='staff'"
        );

        $stmt->bind_param(
            "i",
            $id
        );

        return $stmt->execute();
    }


    public function getAppointments()
    {
        $stmt = $this->conn->prepare(
            "SELECT
                appointments.*,
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

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function getPatients()
    {
        $stmt = $this->conn->prepare(
            "SELECT
                id,
                full_name,
                email,
                status
             FROM users
             WHERE role='patient'
             ORDER BY id DESC"
        );

        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function getBills()
    {
        $stmt = $this->conn->prepare(
            "SELECT
                bills.*,
                users.full_name AS patient_name
             FROM bills
             JOIN users
                ON bills.patient_id = users.id
             ORDER BY bills.id DESC"
        );

        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function uploadReport($patient_id, $title, $file, $test_date)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO test_reports
             (patient_id, report_title, report_file, test_date)
             VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "isss",
            $patient_id,
            $title,
            $file,
            $test_date
        );

        return $stmt->execute();
    }

}

?>