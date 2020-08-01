<link rel="stylesheet" href="style.css?v=4">
<form action="" method="POST">
    <?php if(isset($_SESSION['message']['input']) and $_SESSION['message']['input'] === 'login') include 'elements/info.php'?>
    <input name="login" placeholder="login" value="<?php if(isset($login)) echo $login?>"><br><br>
    <?php if(isset($_SESSION['message']['input']) and $_SESSION['message']['input'] === 'email') include 'elements/info.php'?>
    <input name="email" placeholder="email@email.com" value="<?php if(isset($email)) echo $email?>"><br><br>
    <?php if(isset($_SESSION['message']['input']) and $_SESSION['message']['input'] === 'dob') include 'elements/info.php'?>
    <input name="dateOfBirth" placeholder="DD.MM.YYYY" value="<?php if(isset($dateOfBirth)) echo $dateOfBirth?>"><br><br>
    <?php if(isset($_SESSION['message']['input']) and $_SESSION['message']['input'] === 'password') include 'elements/info.php'?>
    <select size="1" required name="city">
        <option selected disabled>Choose your city</option>
        <option value="Moscow">Moscow</option>
        <option value="St.Petersburg">St.Petersburg</option>
        <option value="London">London</option>
        <option value="New York">New York</option>
    </select><br><br>
    <input name="password" type="password" placeholder="password" value="<?php if(isset($password)) echo $password?>"><br><br>
    <input name="confirm" type="password" placeholder="confirm password" value="<?php if(isset($confirm)) echo $confirm?>"><br><br>
    <input type="submit" name="submit" value="Отправить">
</form>
