<?php

$user = new User();
$user->hash_password();
$content = $user->content;