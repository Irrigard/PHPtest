<?php
    require_once ('../elements/init.php');

    if (isset($_POST['password']) and md5($_POST['password']) == '202cb962ac59075b964b07152d234b70') {
        $_SESSION['auth'] = true;
        header('Location: /admin/'); die();
    } else {
        ob_start();
        include 'elems/formAuth.php';
        echo ob_get_clean();
    }
    session_destroy();





