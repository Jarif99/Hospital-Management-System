<?php

class User
{

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }



    public function login($email,$password,$role)
    {

        $stmt = $this->conn->prepare(
            "SELECT * FROM users 
             WHERE email=? 
             AND password=? 
             AND role=?"
        );


        $stmt->bind_param(
            "sss",
            $email,
            $password,
            $role
        );


        $stmt->execute();


        return $stmt->get_result()->fetch_assoc();

    }



    public function register($name, $email, $password, $role)
    {

        $stmt = $this->conn->prepare(
            "INSERT INTO users
             (full_name, email, password, role, status)
             VALUES (?, ?, ?, ?, 'pending')"
        );


        $stmt->bind_param(
            "ssss",
            $name,
            $email,
            $password,
            $role
        );


        return $stmt->execute();

    }



    public function emailExists($email)
    {

        $stmt = $this->conn->prepare(
            "SELECT id FROM users WHERE email = ? LIMIT 1"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        return $stmt->get_result()->num_rows > 0;

    }



    public function updatePassword($email, $password)
    {

        $stmt = $this->conn->prepare(
            "UPDATE users SET password = ? WHERE email = ?"
        );

        $stmt->bind_param("ss", $password, $email);

        return $stmt->execute();

    }


}

?>