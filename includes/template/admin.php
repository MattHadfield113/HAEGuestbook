<?php

// Lets check see if this user is an admin
$ID = $_REQUEST["post_id"];
$user = new User();

if($user->logged_in() == NULL) {
    $page_title = "Not Authorised";

    $content = "Sorry, you cannot access this page without logging in";
}
else {

    $admin_action = $_REQUEST["admin_action"];

    if ($admin_action == null) {

        $page_title = "Post Admin";

        foreach ($database->Get_All_Posts() as $Post) {
            $content.= "<div class='post'>";
            $content.= "<h2>" . $Post["post_title"] . "</h2>";
            $content.= "<h5>By " . $Post["post_by"] . "</h5>";
            $content.= $Post["post_content"];
            $content.= "<br>";

            if ($Post["post_approved"] == "0")
            {
                $content.="<a href='?action=admin&admin_action=approve&post_id=" . $Post["id"] . "'>Approve Post</a>" ;
            }
            else
            {
                $content.="<a href='?action=admin&admin_action=disapprove&post_id=" . $Post["id"] . "'>Dis-Approve Post</a>" ;

            }
            $content.="<br>";
            $content.="<a href='?action=admin&admin_action=edit_post&post_id=" . $Post["id"] . "'>Edit Post</a><br>" ;
            $content.="<a href='?action=admin&admin_action=delete&post_id=" . $Post["id"] . "'>Delete Post</a>" ;

            $content.= "</div>";


        }


    }
    elseif ($admin_action == "edit_post") {
        $post = $database->Get_Single_Post($ID);
        $page_title = "Editing Post ID " . $ID;
        $content.= "<form method='POST' id='post_edit' name='post_edit'>";
        $content.= "<div class='form-group'>";
        $content.= "<input type='hidden' value='" . $ID . "' name='id' id='id'>";
        $content.= "<label for='post_title'>Post Title</label>";
        $content.= "<input type='text' name='post_title' id='post_title' class='form-control' value='" . $post[0]["post_title"] . "'>";
        $content.= "</div>";
        $content.= "<div class='form-group'>";
        $content.= "<label for='post_by'>Your Name</label>";
        $content.= "<input type='text' name='post_by' id='post_by' class='form-control' value='" . $post[0]["post_by"] . "'>";
        $content.= "</div>";
        $content.= "<div class='form-group'>";
        $content.= "<label for='post_content'>Post Content</label>";
        $content.= "<textarea name='post_content' id='post_content' rows='10' class='form-control'>" . $post[0]["post_content"] . "</textarea>";
        $content.= "</div>";
        $content.= "<div class='form-group'>";
        $content.= "<button type='submit' class='btn btn-success'>Submit</button>";
        $content.= "</div>";
        $content.= "</form>";

    }
    elseif ($admin_action == "delete") {

        $page_title = "Post ID " . $ID . " Deleted";
        $database->Delete_Post($ID);
    }
    elseif ($admin_action == "approve") {
        $page_title = "Post ID " . $ID . " Approved";
        $database->Approve_Post($ID);
    }
    elseif ($admin_action == "disapprove") {
        $page_title = "Post ID " . $ID . " Disapproved";
        $database->Disapprove_Post($ID);
    }
    elseif ($admin_action == "edit_post_submit") {
        $database->Edit_Post($_REQUEST);
    }
    else {
        $page_title = "Error";
        $content = "Action Not Found";
    }


}
