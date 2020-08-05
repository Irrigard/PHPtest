<?php
    function clean($value = "") {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }
    function check_length($value = "", $min, $max) {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
    include 'elements/init.php';
    if (isset($_POST['confirm'])) {
        $login = clean($_POST['login']);
        $password = clean($_POST['password']);
        $confirm = clean($_POST['confirm']);
        $email = clean($_POST['email']);
        $dateOfBirth = clean($_POST['dateOfBirth']);
        if (!empty($_POST['login'])) {
            if (check_length($login, 4, 10)) {
                if (!empty($_POST['password'])) {
                    if (check_length($password, 6, 12)) {
                        if (!empty($_POST['email'])) {
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                if (!empty($_POST['dateOfBirth'])) {
                                    $dobArray = explode('.', $dateOfBirth);
                                    if ($dobArray[0] >= 1 and $dobArray[0] <= 31 and $dobArray[1] >= 1 and $dobArray[1] <= 12 and $dobArray[2] >= 1900 and $dobArray[2] <= 3000) {
                                        if ($password === $confirm) {
                                            if (preg_match("/^[a-z0-9]+$/i", $login)) {
                                                if (preg_match("/^[a-z0-9]+$/i", $password)) {
                                                    $query = "SELECT * FROM users WHERE login='$login'";
                                                    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
                                                    if (empty($user)) {
                                                        $regDate = date('Y-m-d');
                                                        $dateOfBirth = implode('-', array_reverse($dobArray));
                                                        $city = $_POST['city'];
                                                        $password = password_hash($password, PASSWORD_DEFAULT);
                                                        $query = "INSERT INTO users SET login='$login', password='$password', email='$email', dayOfBirth='$dateOfBirth', regDate='$regDate', city='$city', status='user', banned='0'";
                                                        mysqli_query($link, $query);
                                                        $id = mysqli_insert_id($link);
                                                        $_SESSION['auth'] = true;
                                                        $_SESSION['user'] = ['login' => $login, 'id' => $id, 'status' => 'user'];
                                                        $_SESSION['message'] = ['text' => 'Successful authorization', 'status' => 'success'];
                                                        header('Location: index.php'); die();
                                                    } else {
                                                        $_SESSION['message'] = ['text' => 'This login already exists', 'status' => 'error', 'input' => 'login'];
                                                        //   include 'elements/info.php';
                                                    }
                                                } else {
                                                    $_SESSION['message'] = ['text' => 'Incorrect password', 'status' => 'error', 'input' => 'password'];
                                                    //  include 'elements/info.php';
                                                }
                                            } else {
                                                $_SESSION['message'] = ['text' => 'Incorrect login', 'status' => 'error', 'input' => 'login'];
                                                // include 'elements/info.php';
                                            }
                                        } else {
                                            $_SESSION['message'] = ['text' => 'Password doesn\'t match', 'status' => 'error', 'input' => 'password'];
                                            //  include 'elements/info.php';
                                        }
                                    } else {
                                        $_SESSION['message'] = ['text' => 'Incorrect date of birth', 'status' => 'error', 'input' => 'dob'];
                                    }
                                } else {
                                    $_SESSION['message'] = ['text' => 'Empty date of birth', 'status' => 'error', 'input' => 'dob'];
                                    //  include 'elements/info.php';
                                }
                            } else {
                                $_SESSION['message'] = ['text' => 'Incorrect email', 'status' => 'error', 'input' => 'email'];
                            }
                        } else {
                            $_SESSION['message'] = ['text' => 'Empty email', 'status' => 'error', 'input' => 'email'];
                           // include 'elements/info.php';
                        }
                    } else {
                        $_SESSION['message'] = ['text' => 'Password must be from 6 to 12 symbols', 'status' => 'error', 'input' => 'password'];
                     //   include 'elements/info.php';
                    }
                } else {
                    $_SESSION['message'] = ['text' => 'Empty password', 'status' => 'error', 'input' => 'password'];
                 //   include 'elements/info.php';
                }
            } else {
                $_SESSION['message'] = ['text' => 'Login must be from 4 to 10 symbols', 'status' => 'error', 'input' => 'login'];
               // include 'elements/info.php';
            }
        } else {
            $_SESSION['message'] = ['text' => 'Empty login', 'status' => 'error', 'input' => 'login'];
        //    include 'elements/info.php';
        }
    }
    ob_start();
    include 'elements/regForm.php';
    echo ob_get_clean();

