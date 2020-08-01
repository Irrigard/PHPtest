<a href="registration.php">Reg</a>
<form action="" method="POST">
    <?php if(isset($_SESSION['message']['input']) and $_SESSION['message']['input'] === 'login') include 'elements/info.php'?>
    <input name="login">
    <?php if(isset($_SESSION['message']['input']) and $_SESSION['message']['input'] === 'password') include 'elements/info.php'?>
    <input name="password" type="password">
    <input type="submit" value="Отправить">
</form>
