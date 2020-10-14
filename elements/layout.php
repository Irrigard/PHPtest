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
            $fh = new FormHelper();
            echo $fh->openForm(['action' => '', 'method' => 'GET']);
            echo $fh->input(['name' => 'year']);
            echo $fh->checkbox(['name' => 'check']);
            echo $fh->textArea('text', ['name' => 'text']);
            echo $fh->select(
                ['name' => 'list', 'class' => 'eee'],
                [
                    ['text' => 'item1', 'attrs' => ['value' => '1']],
                    ['text' => 'item2', 'attrs' => ['value' => '2']],
                    ['text' => 'item3', 'attrs' => ['value' => '3', 'class' => 'last']],
                ]
            );
            echo $fh->submit();
            echo $fh->closeForm();


            ?>
        </footer>
    </div>
</body>
</html>



