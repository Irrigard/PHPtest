<?php
    include 'elements/init.php';
    $title = 'page 1';
    if (empty($_SESSION['auth'])) {
        $content = 'You are not logged in<br><a href="../auth.php">Login</a>';
    } else {
        $content = '<a href="../auth.php">Logout</a>Page 1 content';
    }
    $userLogin = $_SESSION['user']['login'];
    $userStatus = $_SESSION['user']['status'];
    include 'elements/layout.php';

