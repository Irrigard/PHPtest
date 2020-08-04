<?php
include 'elements/init.php';
function deleteUser($link) {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query = "DELETE FROM users WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'User deleted successfully', 'status' => 'success'];
        header('Location: admin.php'); die();
    }
}
function changeStatus($link) {
    if (isset($_GET['up'])) {
        $id = $_GET['up'];
        $query = "UPDATE users SET status='admin' WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'User promoted successfully', 'status' => 'success'];
        header('Location: admin.php'); die();
    }
    if (isset($_GET['down'])) {
        $id = $_GET['down'];
        $query = "UPDATE users SET status='user' WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'User downgraded successfully', 'status' => 'success'];
        header('Location: admin.php'); die();
    }
}
deleteUser($link);
changeStatus($link);
if ($_SESSION['auth'] === true and $_SESSION['user']['status'] === 'admin') {
    $query = "SELECT id, login, status FROM users";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    $content = '<table><tr>
                        <th>login</th>
                        <th>status</th>
                        <th>Change status</th>
                        <th>del</th>
                        </tr>';
    foreach ($data as $user) {
        if ($_SESSION['user']['id'] === $user['id']) {
            $delAhref = '';
            $rowColor = " style='background-color: red;'";
            $changeDirection = '';
        } else {
            $delAhref = "<a href=\"admin.php?del={$user['id']}\">Delete</a>";
            if ($user['status'] === 'user') {
                $rowColor = " style='background-color: green;'";
                $changeDirection = "<a href=\"admin.php?up={$user['id']}\">Promote</a>";
            }
            if ($user['status'] === 'admin') {
                $rowColor = " style='background-color: red;'";
                $changeDirection = "<a href=\"admin.php?down={$user['id']}\">Downgrade</a>";
            }
        }

        $content .= "<tr>
            <td{$rowColor}>{$user['login']}</td>
            <td{$rowColor}>{$user['status']}</a></td>
            <td{$rowColor}>{$changeDirection}</a></td>
            <td{$rowColor}>{$delAhref}</td>
            </tr>";
    }
    $content .= '</table>';
} else {
    $content = 'Access denied';
}
$title = 'Closed page';
$userLogin = $_SESSION['user']['login'];
$userStatus = $_SESSION['user']['status'];
include 'elements/layout.php';