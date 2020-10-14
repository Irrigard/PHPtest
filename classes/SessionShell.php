<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 14.10.2020
 * Time: 21:16
 */

class SessionShell
{
    public function __construct()
    {
        if (!isset($_SESSION))
        {
            session_start();
        }
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        if (isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
        return null;
    }

    public function del($name)
    {
        if (isset($_SESSION[$name]))
        {
            unset($_SESSION[$name]);
        }
    }

    public function exists($name)
    {
        if (isset($_SESSION[$name]))
        {
            return true;
        }
        return false;
    }

    public function destroy()
    {
        session_destroy();
    }
}