<?php

use PDO;

class databaseConnect
{

    public $db;


    public function __construct()
    {



       try{ $database_host = DatabaseHost;
        $database_username = DatabaseUsername;
        $database_password = DatabasePassword;
        $database_port = DatabasePort;
        $database_name = DatabaseName;


           $pdoOpts = [

               PDO::ATTR_ERRMODE			 => PDO::ERRMODE_EXCEPTION,

               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

               PDO::ATTR_EMULATE_PREPARES	 => false

           ];

        $this->db = new PDO("mysql:host=$database_host;port=$database_port;dbname=$database_name", $database_username, $database_password, $pdoOpts);
           }
       catch(PDOException $e)
       {
           $content = "Connection failed: " . $e->getMessage() . "<br/>" . print_r($e->getTrace());
       }
    }

    public function Get_All_Posts()
    {

      return $this->db->query('SELECT * FROM guestbook')->fetchAll(PDO::FETCH_CLASS, "databaseConnect");

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