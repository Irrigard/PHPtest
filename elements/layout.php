<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css?v=5">
    <title><?= $title ?></title>
</head>
<body>
    <div id="wrapper">
        <header>
            <a href="../index.php">Main</a>
            <a href="../users.php">Users</a>
            <a href="../personalArea.php">PersonalArea</a>
            <a href="../auth.php">Logout</a>
            <?php if($_SESSION['user']['status'] === 'admin') echo '<a href="../admin.php">Admin</a>' ?>
            <a href="../1.php">Page 1</a><br>
            <span>You are authorised as <?= $userLogin ?>. Your status is <?= $userStatus ?>.</span><br>
            <?php include 'elements/menu.php'?>
        </header>
        <main>
            <?php include 'elements/info.php'?>
            <?= $content ?>
        </main>
        <footer>
            footer
            <?php
            $dbSh = new DatabaseShell('localhost', 'root', '', 'test');
           // echo $dbSh->selectAll('users', 'where id >= 3');




            ?>
        </footer>
    </div>
</body>
</html>



