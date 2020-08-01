<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css?v=4">
    <title><?= $title ?></title>
</head>
<body>
    <div id="wrapper">
        <header>
            <a href="../index.php">Main</a>
            <a href="../1.php">Page 1</a>
        </header>
        <main>
            <?php include 'elements/info.php'?>
            <?= $content ?>
        </main>
        <footer>
            footer
        </footer>
    </div>
</body>
</html>



