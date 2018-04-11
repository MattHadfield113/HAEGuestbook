<?php

class User extends databaseConnect
{

    public $page_title;
    public $content;

    public function hash_password($password = "test")
    {
        $this->content = password_hash($password, PASSWORD_DEFAULT);
    }

    public function logged_in()
    {
        session_start();

// If session variable is not set it will redirect to login page
        if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
            return null;
            exit;
        }
        return $_SESSION['username'];
    }


    public function login($data)
    {

        $username = trim($data["username"]);
        $password = trim($data['password']);

                $sql = "SELECT username, password FROM users WHERE username = :username";

                if($stmt = $this->db->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);

                    // Set parameters
                    $param_username = trim($data["username"]);

                    // Attempt to execute the prepared statement
                    if($stmt->execute()){
                        // Check if username exists, if yes then verify password
                        if($stmt->rowCount() == 1){
                            if($row = $stmt->fetch()){
                                $hashed_password = $row['password'];
                                if(password_verify($password, $hashed_password)){
                                    /* Password is correct, so start a new session and
                                    save the username to the session */
                                    session_start();
                                    $_SESSION['username'] = $username;
                                    header("location: index.php?action=admin");
                                } else{
                                    // Display an error message if password is not valid
                                    $this->page_title = 'Error';
                                    $this->content = 'The password you entered was not valid.';
                                }
                            }
                        } else{
                            // Display an error message if username doesn't exist
                            $this->page_title = 'Error';
                            $this->content = 'No account found with that username.';
                        }
                    } else{
                        $this->page_title = 'Error';
                        $this->content = "Oops! Something went wrong. Please try again later.";
                    }
                }

                // Close statement
                unset($stmt);

            // Close connection
            unset($this->db);

    }

    public function logout()
    {
        // Initialize the session
        session_start();

        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session.
        session_destroy();
        header("location: index.php");
    }

}