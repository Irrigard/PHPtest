<?php
    include 'elements/init.php';
    $title = 'page 5';
    if (empty($_SESSION['auth'])) {
        $content = 'You are not logged in<br><a href="../auth.php">Login</a>';
    } else {
        $content = 'Page 5 content';
    }
    $userLogin = $_SESSION['user']['login'];
    $userStatus = $_SESSION['user']['status'];
    include 'elements/layout.php';