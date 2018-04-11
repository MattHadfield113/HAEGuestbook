<?php

$page_title = "Posts by our Guests";

foreach ($database->Get_All_Posts() as $Post) {
    echo "<div style='post'>";
    echo "<h2>" . $Post->Title . "</h2>";
    echo $Post->Content;
    echo "</div>";

}