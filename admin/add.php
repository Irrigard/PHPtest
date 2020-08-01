<?php
    require_once ('../elements/init.php');

    if (!empty($_SESSION['auth'])) {
        function getPage() {
            $title = 'admin add new page';

            if (isset($_POST['title']) AND isset($_POST['url']) AND isset($_POST['text'])) {
                $title = $_POST['title'];
                $url = $_POST['url'];
                $text = $_POST['text'];
            } else {
                $title = '';
                $url = '';
                $text = '';
            }

            ob_start();
            include 'elems/form.php';
            $content = ob_get_clean();
            include 'elems/layout.php';
        }

        function addPage($link) {
            if (isset($_POST['title']) AND isset($_POST['url']) AND isset($_POST['text'])) {
                $title = mysqli_real_escape_string($link, $_POST['title']);
                $url = mysqli_real_escape_string($link, $_POST['url']);
                $text = mysqli_real_escape_string($link, $_POST['text']);

                $query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                $isPage = mysqli_fetch_assoc($result)['count'];
                if ($isPage) {
                    $_SESSION['message'] = ['text' => 'Page with this url exists!', 'status' => 'error'];
                } else {
                    $query = "INSERT INTO pages (title, url, text) VALUES ('$title', '$url', '$text')";
                    mysqli_query($link, $query) or die(mysqli_error($link));
                    $_SESSION['message'] = ['text' => 'Page added successfully', 'status' => 'success'];
                    header('Location: /admin/'); die();
                }
            } else {
                return '';
            }
        }
        addPage($link);
        getPage();
    } else {
        header('Location: /admin/login.php'); die();
    }





