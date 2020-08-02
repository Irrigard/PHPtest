<link rel="stylesheet" href="style.css?v=4">
<br><span>Change data</span>
<form action="" method="POST">
    <input name="firstName" placeholder="First Name" value="<?php if(isset($firstName)) echo $firstName?>"><br><br>
    <input name="lastName" placeholder="Last Name" value="<?php if(isset($lastName)) echo $lastName?>"><br><br>
    <input name="patronymic" placeholder="Patronymic" value="<?php if(isset($patronymic)) echo $patronymic?>"><br><br>
    <input name="email" placeholder="email@email.com" value="<?php if(isset($email)) echo $email?>"><br><br>
    <input name="dateOfBirth" placeholder="DD.MM.YYYY" value="<?php if(isset($dateOfBirth)) echo $dateOfBirth?>"><br><br>
    <select size="1" required name="city">
        <option <?php if(!isset($city)) echo 'selected '?> disabled>Choose your city</option>
        <option <?php if(isset($city) and $city == 'Moscow') echo 'selected '?> value="Moscow">Moscow</option>
        <option <?php if(isset($city) and $city == 'St.Petersburg') echo 'selected '?> value="St.Petersburg">St.Petersburg</option>
        <option <?php if(isset($city) and $city == 'London') echo 'selected '?> value="London">London</option>
        <option <?php if(isset($city) and $city == 'New York') echo 'selected '?> value="New York">New York</option>
    </select><br><br>
    <input type="submit" name="submit" value="Отправить">
</form><br><br>
<span>Change password</span>
<form action="" method="POST">
    <input name="oldPassword" type="password" placeholder="Old password"><br><br>
    <input name="newPassword" type="password" placeholder="New password"><br><br>
    <input name="reNewPassword" type="password" placeholder="New password"><br><br>
    <input type="submit" name="submit" value="Отправить">
</form>
<br><br>
<span>Delete personal page</span>
<form action="" method="POST">
    <input name="Password" type="password" placeholder="Password"><br><br>
    <input type="submit" name="submit" value="Delete">
</form>
