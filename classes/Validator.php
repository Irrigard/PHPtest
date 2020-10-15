<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 15.10.2020
 * Time: 21:12
 */

class Validator
{
    public function isEmail($str)// проверяет строку на то, что она корректный email
    {
        return filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    public function isDomain($str)
    {
        // проверяет строку на то, что она корректное имя домена
        return (preg_match("/^([a-zа-яё\d](-*[a-zа-яё\d])*)(\.([a-zа-яё\d](-*[a-zа-яё\d])*))*$/iu", $str) //valid chars check
            && preg_match("/^.{1,253}$/", $str) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $str)); //length of each label ([^\.]===не точка)
    }

    public function inRange($num, $from, $to)// проверяет число на то, что оно входит в диапазон
    {
        if ($num >= $from and $num <= $to)
        {
            return true;
        } else {
            return false;
        }
    }

    public function inLength($str, $from, $to)// проверяет строку на то, что ее длина входит в диапазон
    {
        if (strlen($str) >= $from and strlen($str) <= $to)
        {
            return true;
        } else {
            return false;
        }
    }
}