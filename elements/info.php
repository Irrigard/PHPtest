<?php
    if (isset($_SESSION['message'])) {
        $status = $_SESSION['message']['status'];
        $text = $_SESSION['message']['text'];
        echo "<p class=\"$status\">$text</p>";

        $_SESSION['message'] = NULL;
    }






