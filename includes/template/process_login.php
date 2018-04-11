<?php

$user = new User();
$user->login($_POST);

$page_title = $user->page_title;
$content = $user->content;