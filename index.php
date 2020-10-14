<?php
include 'elements/init.php';
if (empty($_SESSION['auth'])) {
    header('Location: auth.php'); die();
} else {
    $title = 'main page';
    $content = '';
    $userLogin = $_SESSION['user']['login'];
    $userStatus = $_SESSION['user']['status'];
    $cs = new CookieShell();
    if ($cs->exists('f5'))
    {
        $i = $cs->get('f5');
        $cs->set('f5', $cs->get('f5') + 1, 3600);
    } else {
        $cs->set('f5', 0, 3600);
    }
    include 'elements/layout.php';
}


