<?php
include 'elements/init.php';
if (empty($_SESSION['auth'])) {
    header('Location: auth.php'); die();
} else {
        $query = "SELECT id, login FROM users";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        $content = '<table><tr>
                        <th>id</th>
                        <th>login</th>
                        </tr>';
        foreach ($data as $user) {
            $content .= "<tr>
            <td>{$user['id']}</td>
            <td><a href=\"profile.php?id={$user['id']}\">{$user['login']}</a></td>
            </tr>";
        }
        $content .= '</table>';
    $title = 'profile';
    include 'elements/layout.php';
}