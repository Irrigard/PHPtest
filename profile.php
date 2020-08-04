<?php
include 'elements/init.php';
if (empty($_SESSION['auth'])) {
    header('Location: auth.php'); die();
} else {
    if (empty($_GET['id'])) {
        var_dump($_SESSION);
    } else {
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id='$id'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));
        $interval = date_diff(date_create(), date_create($user['dayOfBirth']));
        $content = '<table><tr>
                        <th>id</th>
                        <th>login</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Patronymic</th>
                        <th>Age</th>
                        </tr>';
            $content .= "<tr>
            <td>{$user['id']}</td>
            <td>{$user['login']}</td>
            <td>{$user['firstName']}</td>
            <td>{$user['lastName']}</td>
            <td>{$user['patronymic']}</td>
            <td>{$interval->format('%y')}</td>
            </tr>";
        $content .= '</table>';
    }
    $title = 'profile';
    $userLogin = $_SESSION['user']['login'];
    $userStatus = $_SESSION['user']['status'];
    include 'elements/layout.php';
}


