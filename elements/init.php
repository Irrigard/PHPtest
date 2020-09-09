<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    //Устанавливаем доступы к базе данных:
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $password = ''; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    //Соединяемся с базой данных используя наши доступы:
    $link = mysqli_connect($host, $user, $password, $db_name);

    //Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
    mysqli_query($link, "SET NAMES 'utf8'");
    session_start();
    require_once 'classes/Data.php';
    require_once 'classes/Interval.php';
    require_once 'classes/iFile.php';
    require_once 'classes/File.php';
    require_once 'classes/Tag.php';