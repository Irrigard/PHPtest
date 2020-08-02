<?php
include 'elements/init.php';
if (empty($_SESSION['auth'])) {
    header('Location: auth.php'); die();
} else {
    $id = $_SESSION['user']['id'];
    $query = "SELECT * FROM users WHERE id='$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $patronymic = $user['patronymic'];
    $email = $user['email'];
    $dateOfBirth = $user['dayOfBirth'];
    $city = $user['city'];
    $hash = $user['password'];

    if (isset($_POST['firstName']) AND isset($_POST['lastName']) AND isset($_POST['patronymic']) AND isset($_POST['email']) AND isset($_POST['dateOfBirth']) AND isset($_POST['city'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $patronymic = $_POST['patronymic'];
        $email = $_POST['email'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $city = $_POST['city'];
        //здесь должны быть проверки по каждому полю
        $query = "UPDATE users SET firstName='$firstName', lastName='$lastName', patronymic='$patronymic', city='$city', email='$email', dayOfBirth='$dateOfBirth' WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'Data edited successfully', 'status' => 'success'];
        header('Location: personalArea.php'); die();
    }

    if (!empty($_POST['oldPassword']) AND !empty($_POST['newPassword']) AND !empty($_POST['reNewPassword'])) {
        if (password_verify($_POST['oldPassword'], $hash) AND $_POST['newPassword'] === $_POST['reNewPassword']) {
            $newPasswordHash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $query = "UPDATE users SET password='$newPasswordHash' WHERE id=$id";
            mysqli_query($link, $query) or die(mysqli_error($link));
            $_SESSION['message'] = ['text' => 'Password changed successfully', 'status' => 'success'];
            header('Location: personalArea.php'); die();
        } else {
            $_SESSION['message'] = ['text' => 'Wrong password', 'status' => 'error'];
            header('Location: personalArea.php'); die();
        }
    }

    if (!empty($_POST['Password'])) {
        if (password_verify($_POST['Password'], $hash)) {
            $query = "DELETE FROM users WHERE id=$id";
            mysqli_query($link, $query) or die(mysqli_error($link));
            header('Location: auth.php'); die();
        } else {
            $_SESSION['message'] = ['text' => 'Wrong password', 'status' => 'error'];
            header('Location: personalArea.php'); die();
        }
    }
    $title = 'Personal Area';
    ob_start();
    include 'elements/editForm.php';
    $content = ob_get_clean();
    include 'elements/layout.php';
}
