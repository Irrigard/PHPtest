<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 14.10.2020
 * Time: 20:44
 */

class CookieShell
{
    public function set($name, $value, $time)
    {
        setcookie($name, $value, time() + $time);
        $_COOKIE[$name] = $value;
    }

    public function get($name)
    {
        if (isset($_COOKIE[$name]))
        {
            return $_COOKIE[$name];
        } else {
            return null;
        }
    }

    public function del($name)
    {
        setcookie($name, '', time());
        $_COOKIE[$name] = null;
    }

    public function exists($name)
    {
        if (isset($_COOKIE[$name]))
        {
            return true;
        }
        return false;
    }

}