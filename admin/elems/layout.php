<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css?v=4">
    <title><?= $title ?></title>
</head>
<body>
    <div id="wrapper">
        <header>
            <a href="/admin/add.php">Add new page</a>
            <a href="/admin/login.php">Logout</a>
        </header>
        <main>
            <?php include 'elems/info.php'?>
            <?= $content ?>
        </main>
        <footer>
            footer
        </footer>
    </div>
</body>
</html>



