<?php

class databaseConnect
{

    public $db;


    public function __construct()
    {

        $database_host = DatabaseHost;
        $database_username = DatabaseUsername;
        $database_password = DatabasePassword;
        $database_name = DatabaseName;

        $this->db = PDO("mysql:host=$database_host;dbname=$database_name", $database_username, $database_password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    }

    public function Get_All_Posts()
    {

    }

    public function Get_Single_Post($id)
    {

    }

    public function Create_Post()
    {

    }

    public function Edit_Post($id)
    {


    }

    private function __destruct()
    {

    }


}