<?php

$page_title = "Create A New Post";

$content.= "<form method='POST' id='post_data' name='post_data'>";
$content.= "<div class='form-group'>";
$content.= "<label for='post_title'>Post Title</label>";
$content.= "<input type='text' name='post_title' id='post_title' class='form-control' value='" . $_REQUEST["post_title"] . "'>";
$content.= "</div>";
$content.= "<div class='form-group'>";
$content.= "<label for='post_by'>Your Name</label>";
$content.= "<input type='text' name='post_by' id='post_by' class='form-control' value='" . $_REQUEST["post_by"] . "'>";
$content.= "</div>";
$content.= "<div class='form-group'>";
$content.= "<label for='post_content'>Post Content</label>";
$content.= "<textarea name='post_content' id='post_content' rows='10' class='form-control'>" . $_REQUEST["post_content"] . "</textarea>";
$content.= "</div>";
$content.= "<div class='form-group'>";
$content.= "<button type='submit' class='btn btn-success'>Submit</button>";
$content.= "</div>";
$content.= "</form>";