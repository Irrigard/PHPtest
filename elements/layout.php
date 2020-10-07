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
            $form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

            echo $form->open();
            echo (new Input)   ->setAttr('name', 'login');
            echo (new Password)->setAttr('name', 'passw');
            echo (new Radio())->setAttr('name', 'radio')->setAttr('value', '1');
            echo (new Radio())->setAttr('name', 'radio')->setAttr('value', '2');
            echo (new Radio())->setAttr('name', 'radio')->setAttr('value', '3');
	        echo new Submit;
            echo $form->close();


            ?>
        </footer>
    </div>
</body>
</html>



