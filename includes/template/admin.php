<?php

// Lets check see if this user is an admin

$loggedin = 1;

if($loggedin == NULL) {
    $page_title = "Not Authorised";

    $content = "Sorry, you cannot access this page without logging in";
}
else {

    $admin_action = $_REQUEST["admin_action"];

    if ($admin_action == null) {

        $page_title = "Welcome Admin";

        $content = "<h2>Select Action</h2>
        <ul>
        <li><a href='?action=admin&admin_action=edit_post'>Modify Posts</a></li>
</ul>";


    }
    elseif ($admin_action == "edit_post") {

        $page_title = "Editing Post";

    }


}
