<?php
include 'elements/init.php';
if (empty($_SESSION['auth'])) {
    header('Location: auth.php'); die();
} else {
    $title = 'main page';
    $content = '';
    $userLogin = $_SESSION['user']['login'];
    $userStatus = $_SESSION['user']['status'];
    include 'elements/layout.php';
}


