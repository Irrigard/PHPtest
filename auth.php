<?php
include 'elements/init.php';
// Если форма авторизации отправлена...
if (!empty($_POST['password']) and !empty($_POST['login'])) {

    // Пишем логин и пароль из формы в переменные для удобства работы:
    $login = $_POST['login'];


    // Формируем и отсылаем SQL запрос:
    $query = "SELECT users.id as id, users.password as password, users.banned as banned, status.name as status FROM users LEFT JOIN status ON users.status_id = status.id WHERE login='$login'";
    $result = mysqli_query($link, $query);

    // Преобразуем ответ из БД в нормальный массив PHP:
    $user = mysqli_fetch_assoc($result);
    $id = $user['id'];
    $status = $user['status'];
    if(!empty($user)) {
        $hash = $user['password'];
        if (password_verify($_POST['password'], $hash)) {
            if ($user['banned'] === '0') {
                $_SESSION['auth'] = true;
                $_SESSION['user'] = ['login' => $login, 'id' => $id, 'status' => $status];
                $_SESSION['message'] = ['text' => 'Successful authorization', 'status' => 'success'];
                header('Location: index.php'); die();
            } else {
                $_SESSION['message'] = ['text' => 'You are banned', 'status' => 'error', 'input' => 'password'];
            }
        } else {
            $_SESSION['message'] = ['text' => 'Incorrect password', 'status' => 'error', 'input' => 'password'];
        }
    } else {
        $_SESSION['message'] = ['text' => 'Incorrect login', 'status' => 'error', 'input' => 'login'];
    }
}
include 'elements/form.php';
$_SESSION['auth'] = NULL;
$_SESSION['user'] = NULL;