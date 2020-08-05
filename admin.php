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
        $query = "UPDATE users SET status_id='1' WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'User promoted successfully', 'status' => 'success'];
        header('Location: admin.php'); die();
    }
    if (isset($_GET['down'])) {
        $id = $_GET['down'];
        $query = "UPDATE users SET status_id='2' WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'User downgraded successfully', 'status' => 'success'];
        header('Location: admin.php'); die();
    }
}
function ban($link) {
    if (isset($_GET['ban'])) {
        $id = $_GET['ban'];
        $query = "UPDATE users SET banned='1' WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'User banned successfully', 'status' => 'success'];
        header('Location: admin.php'); die();
    }
    if (isset($_GET['unBan'])) {
        $id = $_GET['unBan'];
        $query = "UPDATE users SET banned='0' WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'User unbanned successfully', 'status' => 'success'];
        header('Location: admin.php'); die();
    }
}
ban($link);
deleteUser($link);
changeStatus($link);
if ($_SESSION['auth'] === true and $_SESSION['user']['status'] === 'admin') {
    $query = "SELECT users.id as id, login, status.name as status, banned FROM users LEFT JOIN status ON users.status_id = status.id ORDER BY users.id";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    $content = '<table><tr>
                        <th>login</th>
                        <th>status</th>
                        <th>change status</th>
                        <th>banned</th>
                        <th>ban</th>
                        <th>del</th>
                        </tr>';
    foreach ($data as $user) {
        if ($_SESSION['user']['id'] === $user['id']) {
            $delAhref = '';
            $rowColor = " style='background-color: red;'";
            $changeDirection = '';
            $ban = '';
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
            if ($user['banned'] === '0') {
                $ban = "<a href=\"admin.php?ban={$user['id']}\">Ban</a>";
            }
            if ($user['banned'] === '1') {
                $ban = "<a href=\"admin.php?unBan={$user['id']}\">unBan</a>";
            }
        }

        $content .= "<tr>
            <td{$rowColor}>{$user['login']}</td>
            <td{$rowColor}>{$user['status']}</a></td>
            <td{$rowColor}>{$changeDirection}</a></td>
            <td{$rowColor}>{$user['banned']}</a></td>
            <td{$rowColor}>{$ban}</a></td>
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
