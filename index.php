<?php
include 'elements/init.php';
if (empty($_SESSION['auth'])) {
    header('Location: auth.php'); die();
} else {
    $title = 'main page';
    $content = '';
    $userLogin = $_SESSION['user']['login'];
    $userStatus = $_SESSION['user']['status'];
    $ss = new SessionShell();
    if ($ss->exists('f5'))
    {
        $ss->set('f5', $ss->get('f5') + 1);
    } else {
        $ss->set('f5', 0);
    }
    include 'elements/layout.php';
}


