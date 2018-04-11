<?php

$page_title = "Admin Login";

$content.= "<form class='form-horizontal' method='post' action='?action=process_login'>";
$content.= "<div class='form-group'>";
$content.= "<label for='username' class='control-label col-sm-2'>Username</label>";
$content.= "<input type='text' name='username' id='username' class='form-control' placeholder='Username'>";
$content.= "</div>";
$content.= "<div class='form-group'>";
$content.= "<label for='password' class='control-label col-sm-2'>Password</label>";
$content.= "<input type='password' name='password' id='password' class='form-control' placeholder='Password'>";
$content.= "</div>";
$content.= "<div class='form-group'>";
$content.= "<button type='submit' class='btn btn-success'>Submit</button>";
$content.= "</div>";
$content.= "</form>";