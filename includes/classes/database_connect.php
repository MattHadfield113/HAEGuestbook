<?php

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

      return $this->db->query('SELECT * FROM guestbook')->fetchAll(PDO::FETCH_ASSOC);

    }

    public function Get_Approved_Posts()
    {

        return $this->db->query('SELECT * FROM guestbook WHERE post_approved = 1')->fetchAll(PDO::FETCH_ASSOC);

    }

    public function Delete_Post($id)
    {
        $sql = "DELETE FROM guestbook WHERE id=" . $id;
        $this->db->exec($sql);
    }

    public function Approve_Post($id)
    {
        $sql = "UPDATE guestbook SET post_approved='1' WHERE id=" . $id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }


    public function Disapprove_Post($id)
    {
        $sql = "UPDATE guestbook SET post_approved='0' WHERE id=" . $id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }


    public function Get_Single_Post($id)
    {
        return $this->db->query('SELECT * FROM guestbook WHERE id = "' . $id .  '"')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Create_Post($data)
    {

        $filtered_name = filter_var($data["post_by"], FILTER_SANITIZE_STRING);
        $filtered_content = filter_var($data["post_content"], FILTER_SANITIZE_STRING);
        $filtered_title = filter_var($data["post_title"], FILTER_SANITIZE_STRING);

       $thepost = $this->db->prepare("INSERT INTO guestbook (post_by,post_title,post_content) VALUES (:post_by,:post_title,:post_content)");
        $thepost->bindParam(':post_by',$filtered_name);
        $thepost->bindParam(':post_title',$filtered_title);
        $thepost->bindParam(':post_content',$filtered_content);
        $thepost->execute();
    }

    public function Edit_Post($data)
    {

        $filtered_name = filter_var($data["post_by"], FILTER_SANITIZE_STRING);
        $filtered_content = filter_var($data["post_content"], FILTER_SANITIZE_STRING);
        $filtered_title = filter_var($data["post_title"], FILTER_SANITIZE_STRING);

        $thepost = $this->db->prepare("UPDATE guestbook SET post_by='" . $filtered_name . "',post_content='" . $filtered_content ."',post_title='" . $filtered_title . "'WHERE id='" . $data["id"] . "'");
        $thepost->execute();

    }

    public function __destruct()
    {
        $this->db = NULL;
    }


}