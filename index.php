<?php
include 'elements/init.php';
if (empty($_SESSION['auth'])) {
    header('Location: auth.php'); die();
} else {
    $title = 'main page';
    $content = 'You are authorised as ' . $_SESSION['user']['login'];
    include 'elements/layout.php';
}
var_dump($_SESSION);


