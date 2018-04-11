<?php

// Load in Config File
require ('includes/config.inc.php');
// Include Database Connections
include ('includes/classes/database_connect.php');
// Start Database
$database = new databaseConnect();
// Include Content File
$action = $_REQUEST["action"];
if ($action == NULL) {
    include "includes/template/frontpage.php";
}
else {
    if(file_exists("includes/template/" . $action . ".php"))
    {
    include "includes/template/" . $action . ".php";
    }
    else {
        include "includes/template/404.php";
    }
}

// Include Main Template
include "includes/template/main.php";



?>

