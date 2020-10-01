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
            <a href="../users.php">Users</a>
            <a href="../personalArea.php">PersonalArea</a>
            <a href="../auth.php">Logout</a>
            <?php if($_SESSION['user']['status'] === 'admin') echo '<a href="../admin.php">Admin</a>' ?>
            <a href="../1.php">Page 1</a><br>
            <span>You are authorised as <?= $userLogin ?>. Your status is <?= $userStatus ?>.</span><br>
        </header>
        <main>
            <?php include 'elements/info.php'?>
            <?= $content ?>
        </main>
        <footer>
            footer
            <?php
                $tag1 = new Tag('button');
                echo $tag1->setAttr('style', 'background-color:green;')->setAttr('id', 'test')->setAttr('disabled')->open() . 'test' . $tag1->close();
            echo (new Tag('input'))
                ->setAttr('class', 'eee zzz kkk') // добавим 3 класса
                ->removeClass('zzz') // удалим класс 'zzz'
                ->open(); // выведет <input class="eee kkk">
            ?>
        </footer>
    </div>
</body>
</html>



