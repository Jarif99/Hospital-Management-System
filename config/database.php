<?php

class Database
{

    private $host = "localhost";
    private $db_name = "hospital_management";
    private $username = "root";
    private $password = "";

    public $conn;


    public function connect()
    {

        $this->conn = null;

        try
        {

            $this->conn = new mysqli(
                $this->host,
                $this->username,
                $this->password,
                $this->db_name
            );


            if($this->conn->connect_error)
            {
                die("Database Connection Failed");
            }

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }


        return $this->conn;

    }

}

?>