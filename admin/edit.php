<?php
    require_once ('../elements/init.php');

    if (!empty($_SESSION['auth'])) {
        function getPage($link) {
            $title = 'admin add new page';

            if (isset($_GET['id'])) {
                $editId = $_GET['id'];
                $query = "SELECT * FROM pages WHERE id=$editId";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                $page = mysqli_fetch_assoc($result);

                if ($page) {
                    if (isset($_POST['title']) AND isset($_POST['url']) AND isset($_POST['text'])) {
                        $title = mysqli_real_escape_string($link, $_POST['title']);
                        $url = mysqli_real_escape_string($link, $_POST['url']);
                        $text = mysqli_real_escape_string($link, $_POST['text']);
                    } else {
                        $title = $page['title'];
                        $url = $page['url'];
                        $text = $page['text'];
                    }
                    ob_start();
                    include 'elems/form.php';
                    $content = ob_get_clean();

                } else {
                    $content = 'Page not found';
                }
            } else {
                $content = 'Page not found';
            }

            include 'elems/layout.php';
        }

        function addPage($link) {
            if (isset($_POST['title']) AND isset($_POST['url']) AND isset($_POST['text'])) {
                $title = mysqli_real_escape_string($link, $_POST['title']);
                $url = mysqli_real_escape_string($link, $_POST['url']);
                $text = mysqli_real_escape_string($link, $_POST['text']);
                /*
                if ($isPage) {
                    return ['text' => 'Page with this url exists!', 'status' => 'error'];
                } else {
                    //$query = "INSERT INTO pages (title, url, text) VALUES ('$title', '$url', '$text')";
                    //mysqli_query($link, $query) or die(mysqli_error($link));
                    header('Location: /admin/?added=true');
                }
                */
                if (isset($_GET['id'])) {
                    $editId = $_GET['id'];
                    $query = "SELECT * FROM pages WHERE id=$editId";
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                    $page = mysqli_fetch_assoc($result);

                    if ($page['url'] !== $url) {
                        $query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
                        $result = mysqli_query($link, $query) or die(mysqli_error($link));
                        $isPage = mysqli_fetch_assoc($result)['count'];
                        if ($isPage == 1) {
                            $_SESSION['message'] = ['text' => 'Page with this url exists!', 'status' => 'error'];
                        }
                        return '';
                    }

                    $query = "UPDATE pages SET title='$title', url='$url', text='$text' WHERE id=$editId";
                    mysqli_query($link, $query) or die(mysqli_error($link));
                    $_SESSION['message'] = ['text' => 'Page edited successfully', 'status' => 'success'];
                }
            } else {
                return '';
            }
        }
        addPage($link);
        getPage($link);
    } else {
        header('Location: /admin/login.php'); die();
    }






