<?php

$page_title = "Posts by our Guests";

$content = "";

foreach ($database->Get_All_Posts() as $Post) {
    $content.= "<div class='post'>";
    $content.= "<h2>" . $Post["post_title"] . "</h2>";
    $content.= "<h5>By " . $Post["post_by"] . "</h5>";
    $content.= $Post["post_content"];
    $content.= "</div>";


}